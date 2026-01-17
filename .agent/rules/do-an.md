---
trigger: always_on
---

# Project Rules & Context: Do-an-Laravel

## Project Overview

This is a Laravel-based E-commerce application featuring a comprehensive Admin panel and a public-facing Shop frontend.
The project uses standard Laravel MVC architecture with Blade templates, SCSS for styling, and MySQL for data persistence.

## Architecture & Structure

### Core Directories

-   **App Logic (`app/`)**:
    -   **Controllers**: Separated by namespace and functionality.
        -   `App\Http\Controllers\Admin`: Backend controllers (e.g., `ProductsController`, `DashboardController`).
        -   `App\Http\Controllers\front`: Frontend controllers (e.g., `ShopController`, `CartController`).
    -   **Models**: Located in `app/Models/`. usage of `HasFactory` and `$fillable` is standard.
    -   **Helpers**: Custom procedural helper functions located in `app/Helpers/*.php` (e.g., `cartHelper.php`).
-   **Views (`resources/views/`)**:
    -   `back/`: Admin panel templates.
    -   `front/`: Frontend shop templates.
    -   `admin/`: (Possible legacy/auth views).
-   **Public Assets**:
    -   Managed via `resources/scss`, `resources/js`.
    -   Compiled outputs (likely via Vite/Mix) to `public/`.

### Naming Conventions

-   **Controllers**: Generally `PascalCase` + `Controller`.
    -   _Note_: Some existing admin controllers use non-standard casing (e.g., `Product_categoriesController`). Start new controllers with standard PascalCase (e.g., `ProductCategoryController`) but respect existing file names when editing.
-   **Models**: `PascalCase`, singular (e.g., `Product`, `Order`).
-   **Routes**: Kebab-case for URLs (e.g., `product-categories`).
-   **Route Names**: Dot notation (e.g., `admin.dashboard`, `shop.detail`).

## Coding Standards & Patterns

### 1. Routing (`routes/web.php`)

-   **Admin**: Grouped under `prefix => 'admin'`.
-   **Auth**: Admin and User auth are separate (`Admin\AuthController` vs `front\AuthUserController`).
-   **Permissions**: Use `middleware('role_or_permission:...')` for Admin routes to enforce access control.
-   **Organization**: Keep Admin and Front routes in distinct blocks/groups.

### 2. Controller Logic

-   **Validation**: Perform validation inline using `$this->validate($request, [...])` within controller methods.
-   **Data sanitization**: Handle currency/numeric inputs manually if needed (e.g., stripping commas from price inputs: `Str_replace(',', '', $price)`).
-   **Responses**:
    -   Use `toast('Message', 'type')` for UI notifications.
    -   Use `return redirect()->...->with('success', ...)` for state transitions.

### 3. Models & Database

-   **Fillable**: Explicitly define `protected $fillable` for mass assignment.
-   **Constants**: Use constants for state/status values (e.g., `const STATUS_ACTIVE = 'active';`).
-   **Relationships**: Define methods for relations (camelCase).

### 4. Views (Blade)

-   **Layouts**:
    -   Admin extends `back.layouts.master` (or similar).
    -   Front extends `front.layouts.master` (or similar).
-   **Assets**: Use `asset()` helper for linking styles/scripts.

### 5. Helpers

-   Offload complex, reusable logic (like Cart calculations, specific menu rendering) to `app/Helpers/`.
-   Do not bloat Controllers with logic that belongs in a Helper.

## Workflow Instructions

1.  **Context Loading**: When working on specific modules (e.g., Products), load the related Controller, Model, and View to understand specific validation rules and field names.
2.  **Permissions**: When adding new Admin features, remember to check/assign appropriate permissions or roles in the middleware.
3.  **UI Updates**: If modifying styles, check `resources/scss` and ensure build tools are run (if active) or advise the user to run `npm run dev`.
