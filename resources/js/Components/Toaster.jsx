import { usePage } from '@inertiajs/react';
import { CircleAlert, CircleCheck, Info, TriangleAlert, X } from 'lucide-react';
import { createContext, useCallback, useContext, useEffect, useRef, useState } from 'react';

const ToastContext = createContext(() => {});

const styles = {
    success: { icon: CircleCheck, className: 'text-emerald-600' },
    error: { icon: CircleAlert, className: 'text-red-600' },
    warning: { icon: TriangleAlert, className: 'text-amber-500' },
    info: { icon: Info, className: 'text-blue-600' },
};

export function useToast() {
    return useContext(ToastContext);
}

// Shows toastr()-> notifications from the server, every validation error
// (as the old toastr footer did) unless the page shows them inline, and
// toasts raised from the client.
export default function ToastProvider({ toastErrors = true, children }) {
    const { flash, errors } = usePage().props;
    const [toasts, setToasts] = useState([]);
    const nextId = useRef(0);

    const dismiss = useCallback((id) => {
        setToasts((current) => current.filter((toast) => toast.id !== id));
    }, []);

    const notify = useCallback(
        (type, message) => {
            const id = nextId.current++;
            setToasts((current) => [...current, { id, type, message }]);
            setTimeout(() => dismiss(id), type === 'error' ? 8000 : 5000);
        },
        [dismiss],
    );

    useEffect(() => {
        (flash ?? []).forEach(({ type, message }) => notify(type, message));
    }, [flash, notify]);

    useEffect(() => {
        if (toastErrors) {
            Object.values(errors ?? {}).forEach((message) => notify('error', message));
        }
    }, [errors, notify, toastErrors]);

    return (
        <ToastContext.Provider value={notify}>
            {children}

            <div
                aria-live="polite"
                className="pointer-events-none fixed inset-x-0 top-4 z-50 flex flex-col items-center gap-2 px-4 sm:items-end"
            >
                {toasts.map((toast) => {
                    const { icon: Icon, className } = styles[toast.type] ?? styles.info;

                    return (
                        <div
                            key={toast.id}
                            className="pointer-events-auto flex w-full max-w-sm items-start gap-3 rounded-lg bg-white p-4 shadow-lg ring-1 ring-black/5"
                        >
                            <Icon className={`mt-0.5 h-5 w-5 shrink-0 ${className}`} />
                            <p className="flex-1 text-sm text-gray-800">{toast.message}</p>
                            <button
                                type="button"
                                onClick={() => dismiss(toast.id)}
                                className="text-gray-400 hover:text-gray-600"
                            >
                                <span className="sr-only">Dismiss</span>
                                <X className="h-4 w-4" />
                            </button>
                        </div>
                    );
                })}
            </div>
        </ToastContext.Provider>
    );
}
