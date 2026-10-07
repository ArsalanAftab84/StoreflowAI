# Storeflow AI ✨

Storeflow AI is a highly scalable, premium e-commerce platform designed to empower professional businesses with built-in workflow automation and intelligent AI tools—eliminating the need for third-party dependencies like n8n or Lovable.

Built with **Laravel** and **React (via Inertia.js)**, Storeflow AI features an ultra-premium glassmorphism design system out of the box, ensuring your storefront is as beautiful as it is intelligent.

---

## 🚀 Key Features (Implemented)

### 1. Robust E-Commerce Foundation
- **Complete Relational Schema**: Built-in support for Categories, Products, Carts, Orders, and robust User management.
- **Persistent Global Cart**: Cart state is shared globally across the React frontend using Inertia.js Middleware. Carts persist via session (for guests) and database (for authenticated users).
- **Interactive UI**: Fully functional `+` and `-` quantity controls that communicate seamlessly with the Laravel backend without full-page reloads.

### 2. Premium Design Aesthetics
- **Glassmorphism Theme**: An incredibly modern UI utilizing blurs, translucent panels, and vibrant background gradients.
- **Micro-Animations**: Smooth slide-ups, hover scaling, and dynamic React toast notifications.
- **Vanilla/Tailwind Hybrid**: Optimized custom CSS layout built for performance and stunning visual fidelity.

### 3. Integrated AI Customer Service Agent
- **Global Floating Chatbot**: A persistent React chatbot widget accessible from any page.
- **RAG-Ready Backend**: Powered by an extensible `AiController` in Laravel, ready to be plugged directly into the OpenAI or Anthropic API.
- **Animated Interactions**: Features distinct user/assistant chat bubbles and a bouncy typing indicator for realistic AI simulation.

### 4. Scalable Architecture Plan
- *Coming Soon*: Built-in Workflow Automation Engine (native event-driven system replacing Zapier/n8n).
- *Coming Soon*: Stripe Secure Payment Processing.
- *Coming Soon*: Automated AI Product Recommendations based on historical cart data.

---

## 🛠️ Technology Stack

- **Backend:** Laravel 11.x / PHP 8.3
- **Frontend:** React 19 + Inertia.js v3
- **Styling:** Vanilla CSS (Glassmorphism) + Vite
- **Database:** MySQL / PostgreSQL / SQLite
- **Architecture:** Monolith SPA (Single Page Application)

---

## 🚦 Getting Started

Follow these steps to get your local environment set up.

### Prerequisites
- PHP 8.3+
- Node.js (v18+) & NPM
- Composer

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/storeflow-ai.git
   cd storeflow-ai
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node dependencies:**
   ```bash
   npm install
   ```

4. **Environment Configuration:**
   Copy the `.env.example` file to `.env` and configure your database settings.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Run Migrations & Seed the Database:**
   This command will build your schemas and inject beautiful dummy products.
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Start the Development Servers:**
   You need to run both Vite and the Laravel server concurrently.
   
   *In terminal 1:*
   ```bash
   npm run dev
   ```
   *In terminal 2:*
   ```bash
   php artisan serve
   ```

7. **Visit your storefront!**
   Navigate to `http://localhost:8000` in your browser.

---

## 📄 License

This project is licensed under the MIT License.
