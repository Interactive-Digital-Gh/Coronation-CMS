import {
    Briefcase,
    Building2,
    FileText,
    House,
    Inbox,
    Info,
    Lightbulb,
    Mail,
    Package,
} from 'lucide-react';

// Sidebar structure. `routes` lists extra route names that should mark an
// item active (e.g. the create/edit screens that belong to a list page).
export const navigation = [
    {
        heading: 'Individual',
        items: [
            {
                label: 'Homepage',
                icon: House,
                children: [
                    { label: 'Header', route: 'home-header' },
                    { label: 'Section 1', route: 'home-sec1' },
                    { label: 'Section 2', route: 'home-sec2' },
                ],
            },
            {
                label: 'About Page',
                icon: Info,
                children: [
                    { label: 'Header', route: 'about-header' },
                    { label: 'Section 1', route: 'about-sec1' },
                    { label: 'Section 2', route: 'about-sec2' },
                    { label: 'Section 3', route: 'about-sec3' },
                    { label: 'Section 4', route: 'about-sec4' },
                    {
                        label: 'Board of Directors',
                        route: 'about-sec5',
                        routes: ['about-create-bod', 'about-sec5-edit'],
                    },
                    {
                        label: 'Executive Members',
                        route: 'executive-table',
                        routes: ['create-executive-member', 'edit-executive-member'],
                    },
                ],
            },
            {
                label: 'Products & Solutions',
                icon: Package,
                children: [
                    { label: 'Header', route: 'pns-header' },
                    { label: 'Section 1', route: 'pns-sec1' },
                    { label: 'Section 2', route: 'pns-sec2' },
                    {
                        label: 'Motor Insurance',
                        children: [
                            { label: 'Header', route: 'pns-motor-header' },
                            { label: 'Page', route: 'pns-motor' },
                            { label: 'Benefits', route: 'pns-motor-benefits' },
                        ],
                    },
                    {
                        label: 'Travel Insurance',
                        children: [
                            { label: 'Header', route: 'pns-travel-header' },
                            { label: 'Page', route: 'pns-travel' },
                            { label: 'Benefits', route: 'pns-travel-benefits' },
                        ],
                    },
                    {
                        label: 'Home Insurance',
                        children: [
                            { label: 'Header', route: 'pns-house-header' },
                            { label: 'Page', route: 'pns-house-insurance' },
                            { label: 'Benefits', route: 'pns-home-benefits' },
                        ],
                    },
                ],
            },
            {
                label: 'Insights',
                icon: Lightbulb,
                children: [
                    { label: 'All Blogs', route: 'blogs-all', routes: ['edit-blog'] },
                    { label: 'Add New Blog', route: 'add-blog' },
                ],
            },
            {
                label: 'Careers',
                icon: Briefcase,
                children: [
                    { label: 'Header', route: 'careers-header' },
                    { label: 'Section 1', route: 'careers-section1' },
                    { label: 'Section 2', route: 'careers-section2' },
                    { label: 'Section 3', route: 'careers-section3' },
                ],
            },
            {
                label: 'Contact',
                icon: Mail,
                children: [
                    { label: 'Header', route: 'contact-header' },
                    { label: 'Contacts', route: 'contact-details' },
                ],
            },
            { label: 'Quote Requests', icon: FileText, route: 'quote-requests' },
            { label: 'Contact Messages', icon: Inbox, route: 'contact-messages' },
        ],
    },
    {
        heading: 'Institute',
        items: [
            {
                label: 'Products & Solutions',
                icon: Building2,
                children: [
                    { label: 'Header', route: 'institute-pns-header' },
                    { label: 'Section 1', route: 'institute-pns-section1' },
                    { label: 'Section 2', route: 'institute-pns-section2' },
                    {
                        label: 'Motor Insurance',
                        children: [
                            { label: 'Header', route: 'institute-pns-motor-header' },
                            { label: 'Page', route: 'institute-pns-motor-page' },
                            { label: 'Benefits', route: 'institute-pns-motor-benefits' },
                        ],
                    },
                    {
                        label: 'Engineering Insurance',
                        children: [
                            { label: 'Header', route: 'institute-pns-engineering-header' },
                            { label: 'Page', route: 'institute-pns-engineering-page' },
                            { label: 'Benefits', route: 'institute-pns-engineering-benefits' },
                        ],
                    },
                    {
                        label: 'Marine Insurance',
                        children: [
                            { label: 'Header', route: 'institute-pns-marine-header' },
                            { label: 'Page', route: 'institute-pns-marine-page' },
                            { label: 'Benefits', route: 'institute-pns-marine-benefits' },
                        ],
                    },
                ],
            },
        ],
    },
];

export function isItemActive(item) {
    if (item.children) {
        return item.children.some(isItemActive);
    }

    return [item.route, ...(item.routes ?? [])].some((name) => route().current(name));
}
