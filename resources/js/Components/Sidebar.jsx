import { Link } from '@inertiajs/react';
import { ChevronRight } from 'lucide-react';
import { useState } from 'react';
import { isItemActive, navigation } from '@/lib/navigation';

function NavItem({ item, depth = 0 }) {
    const active = isItemActive(item);
    const [open, setOpen] = useState(active);
    const Icon = item.icon;
    const indent = depth === 0 ? 'pl-3' : depth === 1 ? 'pl-10' : 'pl-14';

    if (!item.children) {
        return (
            <li>
                <Link
                    href={route(item.route)}
                    className={`flex items-center gap-3 rounded-md py-2 pr-3 text-sm ${indent} ${
                        active
                            ? 'bg-slate-800 font-medium text-white'
                            : 'text-slate-300 hover:bg-slate-800/60 hover:text-white'
                    }`}
                >
                    {Icon && <Icon className="h-4 w-4 shrink-0" />}
                    {item.label}
                </Link>
            </li>
        );
    }

    return (
        <li>
            <button
                type="button"
                onClick={() => setOpen(!open)}
                aria-expanded={open}
                className={`flex w-full items-center gap-3 rounded-md py-2 pr-3 text-left text-sm ${indent} ${
                    active ? 'text-white' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white'
                }`}
            >
                {Icon && <Icon className="h-4 w-4 shrink-0" />}
                <span className="flex-1">{item.label}</span>
                <ChevronRight className={`h-4 w-4 transition-transform ${open ? 'rotate-90' : ''}`} />
            </button>

            {open && (
                <ul className="mt-1 space-y-1">
                    {item.children.map((child) => (
                        <NavItem key={child.label} item={child} depth={depth + 1} />
                    ))}
                </ul>
            )}
        </li>
    );
}

export default function Sidebar() {
    return (
        <nav className="space-y-6 px-3 py-4">
            {navigation.map((section) => (
                <div key={section.heading}>
                    <p className="px-3 pb-2 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        {section.heading}
                    </p>
                    <ul className="space-y-1">
                        {section.items.map((item) => (
                            <NavItem key={item.label} item={item} />
                        ))}
                    </ul>
                </div>
            ))}
        </nav>
    );
}
