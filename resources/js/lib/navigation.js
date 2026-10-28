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
        heading: 'Personal',
        items: [
            {
                label: 'Homepage',
                icon: House,
                children: [
                    { label: 'Page banner', route: 'home-header' },
                    { label: 'Feature cards', route: 'home-sec1' },
                    { label: 'Insights intro', route: 'home-sec2' },
                ],
            },
            {
                label: 'About Us',
                icon: Info,
                children: [
                    { label: 'Page banner', route: 'about-header' },
                    { label: 'Our Journey', route: 'about-sec1' },
                    { label: 'What We Do', route: 'about-sec2' },
                    { label: 'What We Offer', route: 'about-sec3' },
                    { label: 'Our History', route: 'about-sec4' },
                    {
                        label: 'Board of Directors',
                        route: 'about-sec5',
                        routes: ['about-create-bod', 'about-sec5-edit'],
                    },
                    {
                        label: 'Executive Team',
                        route: 'executive-table',
                        routes: ['create-executive-member', 'edit-executive-member'],
                    },
                ],
            },
            {
                label: 'Products & Solutions',
                icon: Package,
                children: [
                    { label: 'Page banner', route: 'pns-header' },
                    { label: 'Product cards', route: 'pns-sec1' },
                    { label: 'Call to action', route: 'pns-sec2' },
                    {
                        label: 'Motor Insurance',
                        children: [
                            { label: 'Page banner', route: 'pns-motor-header' },
                            { label: 'Product details', route: 'pns-motor' },
                            { label: 'Benefits', route: 'pns-motor-benefits' },
                        ],
                    },
                    {
                        label: 'Travel Insurance',
                        children: [
                            { label: 'Page banner', route: 'pns-travel-header' },
                            { label: 'Product details', route: 'pns-travel' },
                            { label: 'Benefits', route: 'pns-travel-benefits' },
                        ],
                    },
                    {
                        label: 'Home Insurance',
                        children: [
                            { label: 'Page banner', route: 'pns-house-header' },
                            { label: 'Product details', route: 'pns-house-insurance' },
                            { label: 'Benefits', route: 'pns-home-benefits' },
                        ],
                    },
                ],
            },
            {
                label: 'Insights',
                icon: Lightbulb,
                children: [
                    { label: 'All posts', route: 'blogs-all', routes: ['edit-blog'] },
                    { label: 'New post', route: 'add-blog' },
                ],
            },
            {
                label: 'Careers',
                icon: Briefcase,
                children: [
                    { label: 'Page banner', route: 'careers-header' },
                    { label: 'Investing in You', route: 'careers-section1' },
                    { label: 'Culture', route: 'careers-section2' },
                    { label: 'Life at Coronation cards', route: 'careers-section3' },
                ],
            },
            {
                label: 'Contact',
                icon: Mail,
                children: [
                    { label: 'Page banner', route: 'contact-header' },
                    { label: 'Office details', route: 'contact-details' },
                ],
            },
            { label: 'Quote Requests', icon: FileText, route: 'quote-requests' },
            { label: 'Contact Messages', icon: Inbox, route: 'contact-messages' },
        ],
    },
    {
        heading: 'Corporate',
        items: [
            {
                label: 'Products & Solutions',
                icon: Building2,
                children: [
                    { label: 'Page banner', route: 'institute-pns-header' },
                    { label: 'Product cards', route: 'institute-pns-section1' },
                    { label: 'Call to action', route: 'institute-pns-section2' },
                    {
                        label: 'Motor Insurance',
                        children: [
                            { label: 'Page banner', route: 'institute-pns-motor-header' },
                            { label: 'Product details', route: 'institute-pns-motor-page' },
                            { label: 'Benefits', route: 'institute-pns-motor-benefits' },
                        ],
                    },
                    {
                        label: 'Engineering Insurance',
                        children: [
                            { label: 'Page banner', route: 'institute-pns-engineering-header' },
                            { label: 'Product details', route: 'institute-pns-engineering-page' },
                            { label: 'Benefits', route: 'institute-pns-engineering-benefits' },
                        ],
                    },
                    {
                        label: 'Marine Insurance',
                        children: [
                            { label: 'Page banner', route: 'institute-pns-marine-header' },
                            { label: 'Product details', route: 'institute-pns-marine-page' },
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
