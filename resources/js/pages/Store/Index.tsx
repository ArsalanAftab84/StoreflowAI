import React, { useState } from 'react';
import StoreLayout from '../../Layouts/StoreLayout';
import { router } from '@inertiajs/react';

interface Product {
    id: number;
    name: string;
    description: string;
    price: string; 
    image_url: string;
    category?: { name: string };
}

export default function Index({ products }: { products: Product[] }) {
    const [adding, setAdding] = useState<number | null>(null);

    const addToCart = (productId: number) => {
        setAdding(productId);
        router.post(`/cart/${productId}`, {}, {
            preserveScroll: true,
            onFinish: () => setAdding(null),
        });
    };

    return (
        <StoreLayout>
            <div className="hero-section">
                <h1 className="hero-title">Experience AI Commerce</h1>
                <p className="hero-subtitle">Premium goods, intelligently curated for your automated lifestyle.</p>
            </div>
            
            <div className="products-grid">
                {products.length === 0 ? (
                    <p className="no-products">No products found. Add some in the backend!</p>
                ) : (
                    products.map(product => (
                        <div key={product.id} className="product-card glass-panel">
                            <div className="product-image-container">
                                {product.image_url ? (
                                    <img src={product.image_url} alt={product.name} />
                                ) : (
                                    <div style={{height:'100%', display:'flex', alignItems:'center', justifyContent:'center'}}>No Image</div>
                                )}
                            </div>
                            <div className="product-info">
                                <span className="product-category">{product.category?.name || 'Uncategorized'}</span>
                                <h3 className="product-name">{product.name}</h3>
                                <p style={{fontSize:'0.9rem', color:'#9ca3af', marginBottom:'1rem'}}>{product.description}</p>
                                
                                <div className="product-footer">
                                    <span className="product-price">${parseFloat(product.price).toFixed(2)}</span>
                                    <button 
                                        className="add-to-cart-btn" 
                                        onClick={() => addToCart(product.id)}
                                        disabled={adding === product.id}
                                    >
                                        {adding === product.id ? 'Adding...' : 'Add to Cart'}
                                    </button>
                                </div>
                            </div>
                        </div>
                    ))
                )}
            </div>
        </StoreLayout>
    );
}
