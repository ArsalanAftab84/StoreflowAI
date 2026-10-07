import React from 'react';
import StoreLayout from '../../Layouts/StoreLayout';
import { router } from '@inertiajs/react';

interface CartItem {
    id: number;
    quantity: number;
    price: string;
    product: {
        id: number;
        name: string;
        image_url: string;
    };
}

interface Cart {
    id: number;
    items: CartItem[];
}

export default function CartPage({ cart }: { cart: Cart | null }) {
    const total = cart?.items.reduce((acc, item) => acc + (parseFloat(item.price) * item.quantity), 0) || 0;

    const removeItem = (itemId: number) => {
        router.delete(`/cart/item/${itemId}`, { preserveScroll: true });
    };

    const updateQuantity = (itemId: number, action: 'increment' | 'decrement') => {
        router.put(`/cart/item/${itemId}`, { action }, { preserveScroll: true });
    };

    return (
        <StoreLayout>
            <div className="cart-layout glass-panel">
                <h2 className="cart-title">Your Cart</h2>
                
                {!cart || cart.items.length === 0 ? (
                    <p style={{fontSize:'1.2rem', textAlign:'center', padding:'3rem 0'}}>Your cart is beautifully empty.</p>
                ) : (
                    <>
                        <div className="cart-items">
                            {cart.items.map(item => (
                                <div key={item.id} className="cart-item">
                                    {item.product.image_url && (
                                        <img src={item.product.image_url} alt={item.product.name} className="item-img" />
                                    )}
                                    <div className="item-details">
                                        <h4 className="item-name">{item.product.name}</h4>
                                        <p className="item-price">${parseFloat(item.price).toFixed(2)}</p>
                                    </div>
                                    <div className="item-actions">
                                        <div className="quantity-controls">
                                            <button className="qty-btn" onClick={() => updateQuantity(item.id, 'decrement')}>-</button>
                                            <span className="item-quantity">{item.quantity}</span>
                                            <button className="qty-btn" onClick={() => updateQuantity(item.id, 'increment')}>+</button>
                                        </div>
                                        <button className="remove-btn" onClick={() => removeItem(item.id)}>Remove</button>
                                    </div>
                                </div>
                            ))}
                        </div>
                        <div className="cart-summary">
                            <div>
                                <p style={{margin:0, color:'#9ca3af', textTransform:'uppercase', letterSpacing:'1px', fontSize:'0.8rem'}}>Total Amount</p>
                                <div className="cart-total">${total.toFixed(2)}</div>
                            </div>
                            <button className="checkout-btn">Secure Checkout</button>
                        </div>
                    </>
                )}
            </div>
        </StoreLayout>
    );
}
