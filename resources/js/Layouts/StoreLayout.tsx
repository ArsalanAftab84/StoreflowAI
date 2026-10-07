import React, { useState, useEffect } from 'react';
import { Link, usePage } from '@inertiajs/react';
import '../../css/store.css';
import Chatbot from '../Components/Chatbot';

export default function StoreLayout({ children }: { children: React.ReactNode }) {
    const { props } = usePage<any>();
    const cartCount = props.cartCount || 0;
    const flash = props.flash || {};

    const [toast, setToast] = useState<string | null>(null);

    useEffect(() => {
        if (flash.success) {
            setToast(flash.success);
            const timer = setTimeout(() => setToast(null), 3000);
            return () => clearTimeout(timer);
        }
    }, [flash]);

    return (
        <div className="store-container">
            <nav className="store-navbar">
                <div className="nav-brand">
                    <Link href="/">Storeflow AI</Link>
                </div>
                <div className="nav-links">
                    <Link href="/cart" className="cart-link">
                        Cart ({cartCount})
                    </Link>
                </div>
            </nav>
            <main className="store-main">
                {children}
            </main>

            <Chatbot />

            {toast && (
                <div className="toast-container">
                    <div className="toast">{toast}</div>
                </div>
            )}
        </div>
    );
}
