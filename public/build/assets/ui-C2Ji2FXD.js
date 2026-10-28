import{r as n,a as w,j as e,L as y}from"./app-D-P67JYW.js";/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b=(...t)=>t.filter((s,a,r)=>!!s&&s.trim()!==""&&r.indexOf(s)===a).join(" ").trim();/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k=t=>t.replace(/([a-z0-9])([A-Z])/g,"$1-$2").toLowerCase();/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $=t=>t.replace(/^([A-Z])|[\s-_]+(\w)/g,(s,a,r)=>r?r.toUpperCase():a.toLowerCase());/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p=t=>{const s=$(t);return s.charAt(0).toUpperCase()+s.slice(1)};/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */var C={xmlns:"http://www.w3.org/2000/svg",width:24,height:24,viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:2,strokeLinecap:"round",strokeLinejoin:"round"};/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _=t=>{for(const s in t)if(s.startsWith("aria-")||s==="role"||s==="title")return!0;return!1};/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L=n.forwardRef(({color:t="currentColor",size:s=24,strokeWidth:a=2,absoluteStrokeWidth:r,className:l="",children:c,iconNode:f,...m},x)=>n.createElement("svg",{ref:x,...C,width:s,height:s,stroke:t,strokeWidth:r?Number(a)*24/Number(s):a,className:b("lucide",l),...!c&&!_(m)&&{"aria-hidden":"true"},...m},[...f.map(([o,d])=>n.createElement(o,d)),...Array.isArray(c)?c:[c]]));/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i=(t,s)=>{const a=n.forwardRef(({className:r,...l},c)=>n.createElement(L,{ref:c,iconNode:s,className:b(`lucide-${k(p(t))}`,`lucide-${t}`,r),...l}));return a.displayName=p(t),a};/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E=[["path",{d:"m9 18 6-6-6-6",key:"mthhwq"}]],M=i("chevron-right",E);/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T=[["circle",{cx:"12",cy:"12",r:"10",key:"1mglay"}],["line",{x1:"12",x2:"12",y1:"8",y2:"12",key:"1pkeuh"}],["line",{x1:"12",x2:"12.01",y1:"16",y2:"16",key:"4dfq90"}]],A=i("circle-alert",T);/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I=[["circle",{cx:"12",cy:"12",r:"10",key:"1mglay"}],["path",{d:"m9 12 2 2 4-4",key:"dzmm74"}]],P=i("circle-check",I);/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B=[["path",{d:"M15 3h6v6",key:"1q9fwt"}],["path",{d:"M10 14 21 3",key:"gplh6r"}],["path",{d:"M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6",key:"a6xqqp"}]],S=i("external-link",B);/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R=[["path",{d:"M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49",key:"ct8e1f"}],["path",{d:"M14.084 14.158a3 3 0 0 1-4.242-4.242",key:"151rxh"}],["path",{d:"M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143",key:"13bj9a"}],["path",{d:"m2 2 20 20",key:"1ooewy"}]],q=i("eye-off",R);/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z=[["path",{d:"M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0",key:"1nclc0"}],["circle",{cx:"12",cy:"12",r:"3",key:"1v7zrd"}]],F=i("eye",z);/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O=[["circle",{cx:"12",cy:"12",r:"10",key:"1mglay"}],["path",{d:"M12 16v-4",key:"1dtifu"}],["path",{d:"M12 8h.01",key:"e9boi3"}]],D=i("info",O);/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H=[["path",{d:"M21 12a9 9 0 1 1-6.219-8.56",key:"13zald"}]],j=i("loader-circle",H);/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U=[["path",{d:"m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3",key:"wmoenq"}],["path",{d:"M12 9v4",key:"juzpu7"}],["path",{d:"M12 17h.01",key:"p32p05"}]],G=i("triangle-alert",U);/**
 * @license lucide-react v0.577.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W=[["path",{d:"M18 6 6 18",key:"1bl5f8"}],["path",{d:"m6 6 12 12",key:"d8bk6v"}]],Z=i("x",W),N=n.createContext(()=>{}),g={success:{icon:P,className:"text-emerald-600"},error:{icon:A,className:"text-red-600"},warning:{icon:G,className:"text-amber-500"},info:{icon:D,className:"text-blue-600"}};function ee(){return n.useContext(N)}function se({toastErrors:t=!0,children:s}){const{flash:a,errors:r}=w().props,[l,c]=n.useState([]),f=n.useRef(0),m=n.useCallback(o=>{c(d=>d.filter(u=>u.id!==o))},[]),x=n.useCallback((o,d)=>{const u=f.current++;c(v=>[...v,{id:u,type:o,message:d}]),setTimeout(()=>m(u),o==="error"?8e3:5e3)},[m]);return n.useEffect(()=>{(a??[]).forEach(({type:o,message:d})=>x(o,d))},[a,x]),n.useEffect(()=>{t&&Object.values(r??{}).forEach(o=>x("error",o))},[r,x,t]),e.jsxs(N.Provider,{value:x,children:[s,e.jsx("div",{"aria-live":"polite",className:"pointer-events-none fixed inset-x-0 top-4 z-50 flex flex-col items-center gap-2 px-4 sm:items-end",children:l.map(o=>{const{icon:d,className:u}=g[o.type]??g.info;return e.jsxs("div",{className:"pointer-events-auto flex w-full max-w-sm items-start gap-3 rounded-lg bg-white p-4 shadow-lg ring-1 ring-black/5",children:[e.jsx(d,{className:`mt-0.5 h-5 w-5 shrink-0 ${u}`}),e.jsx("p",{className:"flex-1 text-sm text-gray-800",children:o.message}),e.jsxs("button",{type:"button",onClick:()=>m(o.id),className:"text-gray-400 hover:text-gray-600",children:[e.jsx("span",{className:"sr-only",children:"Dismiss"}),e.jsx(Z,{className:"h-4 w-4"})]})]},o.id)})})]})}function te({title:t,breadcrumbs:s=[],description:a,actions:r}){return e.jsxs("div",{className:"mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between",children:[e.jsxs("div",{children:[s.length>0&&e.jsx("ol",{className:"mb-1 flex flex-wrap items-center gap-1 text-sm text-gray-500",children:s.map((l,c)=>e.jsxs("li",{className:"flex items-center gap-1",children:[c>0&&e.jsx(M,{className:"h-3.5 w-3.5"}),l]},l))}),e.jsx("h1",{className:"text-2xl font-semibold text-gray-900",children:t}),a&&e.jsx("p",{className:"mt-1 text-sm text-gray-500",children:a})]}),r&&e.jsx("div",{className:"flex gap-2",children:r})]})}function ae({title:t,description:s,children:a,className:r=""}){return e.jsxs("section",{className:`rounded-xl bg-white shadow-sm ring-1 ring-gray-200 ${r}`,children:[t&&e.jsxs("header",{className:"border-b border-gray-100 px-6 py-4",children:[e.jsx("h2",{className:"text-base font-semibold text-gray-900",children:t}),s&&e.jsx("p",{className:"mt-1 text-sm text-gray-500",children:s})]}),e.jsx("div",{className:"space-y-6 p-6",children:a})]})}function re({url:t="https://coronation.com.gh/"}){const[s,a]=n.useState(!1);return e.jsxs("section",{className:"mb-6 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200",children:[e.jsxs("div",{className:"flex items-center justify-between px-6 py-3",children:[e.jsxs("div",{children:[e.jsx("h2",{className:"text-sm font-semibold text-gray-900",children:"Live site"}),e.jsx("p",{className:"text-sm text-gray-500",children:"The page this section appears on."})]}),e.jsxs("div",{className:"flex items-center gap-2",children:[e.jsxs("a",{href:t,target:"_blank",rel:"noopener",className:"inline-flex items-center gap-1.5 rounded-md px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-100",children:[e.jsx(S,{className:"h-4 w-4"})," Open"]}),e.jsxs(Q,{type:"button",onClick:()=>a(!s),children:[s?e.jsx(q,{className:"h-4 w-4"}):e.jsx(F,{className:"h-4 w-4"}),s?"Hide preview":"Show preview"]})]})]}),s&&e.jsx("iframe",{src:t,title:"Live site",className:"h-[480px] w-full border-t border-gray-200"})]})}function K({htmlFor:t,children:s,className:a=""}){return e.jsx("label",{htmlFor:t,className:`block text-sm font-medium text-gray-700 ${a}`,children:s})}function V({message:t,className:s=""}){return t?e.jsx("p",{className:`mt-1.5 text-sm text-red-600 ${s}`,children:t}):null}const X=n.forwardRef(function({className:s="",...a},r){return e.jsx("input",{type:"text",...a,ref:r,className:`block w-full rounded-md border-gray-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 ${s}`})}),ne=n.forwardRef(function({label:s,id:a,error:r,...l},c){return e.jsxs("div",{children:[e.jsx(K,{htmlFor:a,children:s}),e.jsx(X,{id:a,ref:c,className:"mt-1.5",...l}),e.jsx(V,{message:r})]})}),h="inline-flex items-center justify-center gap-2 rounded-md px-4 py-2 text-sm font-medium shadow-sm transition focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60";function J({className:t="",processing:s=!1,children:a,...r}){return e.jsxs("button",{...r,disabled:s||r.disabled,className:`${h} bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 ${t}`,children:[s&&e.jsx(j,{className:"h-4 w-4 animate-spin"}),a]})}function Q({className:t="",children:s,...a}){return e.jsx("button",{...a,className:`${h} bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:ring-blue-500 ${t}`,children:s})}function oe({className:t="",processing:s=!1,children:a,...r}){return e.jsxs("button",{...r,disabled:s||r.disabled,className:`${h} bg-red-600 text-white hover:bg-red-700 focus:ring-red-500 ${t}`,children:[s&&e.jsx(j,{className:"h-4 w-4 animate-spin"}),a]})}function ce({className:t="",children:s,...a}){return e.jsx(y,{...a,className:`${h} bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 ${t}`,children:s})}function le({processing:t,isDirty:s=!1,label:a="Save changes"}){return e.jsxs("div",{className:"sticky bottom-0 z-10 -mx-4 flex items-center justify-end gap-3 border-t border-gray-200 bg-gray-100/90 px-4 py-4 backdrop-blur sm:mx-0 sm:rounded-b-xl sm:px-0",children:[s&&!t&&e.jsx("span",{className:"text-sm text-gray-500",children:"Unsaved changes"}),e.jsx(J,{type:"submit",processing:t,children:t?"Saving…":a})]})}function ie({param:t,tabs:s,current:a}){return e.jsx("div",{className:"border-b border-gray-200",children:e.jsx("nav",{className:"-mb-px flex flex-wrap gap-x-6",children:s.map(r=>e.jsx(y,{href:`?${t}=${r.value}`,preserveScroll:!0,className:`border-b-2 px-1 py-3 text-sm font-medium ${r.value===a?"border-blue-600 text-blue-600":"border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700"}`,children:r.label},r.value))})})}function de({children:t}){return e.jsx("div",{className:"grid gap-6 lg:grid-cols-2",children:t})}export{ce as B,ae as C,oe as D,S as E,le as F,de as G,V as I,re as L,te as P,Q as S,ne as T,Z as X,J as a,se as b,ie as c,K as d,i as e,D as f,M as g,ee as u};
