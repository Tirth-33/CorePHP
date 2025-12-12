# Quick Start Guide - Restaurant Order Management

## 🚀 Start the Application

```bash
cd c:\xampp\htdocs\Revision\Assesment\Part-3
php artisan serve
```

Visit: **http://localhost:8000**

## 📝 First Time Setup

1. **Register Account**
   - Click "Register" 
   - Fill in: Name, Email, Password
   - Click "Register"

2. **Add Sample Data** (Optional)
   ```bash
   php artisan db:seed --class=SampleDataSeeder
   ```

## 🎯 Quick Workflow

### Add Menu Items
1. Dashboard → Click "Menus"
2. Click "Add Menu"
3. Enter: Name (e.g., "Burger"), Price (e.g., "8.99")
4. Click "Save"

### Add Customers
1. Dashboard → Click "Customers"
2. Click "Add Customer"
3. Enter: Name, Phone
4. Click "Save"

### Create Orders
1. Dashboard → Click "Orders"
2. Click "Add Order"
3. Select: Customer, Menu Item, Quantity
4. Click "Save"

### Toggle Order Status
1. Go to Orders list
2. Click the status button (Yellow = Pending, Green = Delivered)
3. Status toggles automatically

### View Statistics
1. Go to Dashboard
2. See: Total Orders, Top Menu Items

## 📊 Features Overview

| Feature | Location | Action |
|---------|----------|--------|
| Dashboard | /dashboard | View stats |
| Menus | /menus | CRUD operations |
| Customers | /customers | CRUD operations |
| Orders | /orders | CRUD + Status toggle |
| Profile | Top right menu | Edit profile |
| Logout | Top right menu | Sign out |

## 🔑 Key Shortcuts

- **Home**: Click "Dashboard" in navigation
- **Quick Add**: Use "Add [Item]" buttons on each page
- **Edit**: Click "Edit" link in table rows
- **Delete**: Click "Delete" button (confirms action)
- **Status**: Click status badge to toggle

## 💡 Tips

1. **Add menus first** before creating orders
2. **Add customers first** before creating orders
3. **Click status button** to mark orders as delivered
4. **Check dashboard** for top-selling items
5. **Use dark mode** (already enabled)

## 🐛 Troubleshooting

**Issue**: Can't access pages
- **Solution**: Make sure you're logged in

**Issue**: No data showing
- **Solution**: Add menus and customers first, or run seeder

**Issue**: Server not starting
- **Solution**: Check if port 8000 is available

## 📱 Mobile Friendly
The interface is responsive and works on mobile devices.

## 🎨 Color Codes
- **Blue**: Menus section
- **Green**: Customers section  
- **Purple**: Orders section
- **Yellow**: Pending status
- **Green**: Delivered status

## ✅ Checklist for Testing

- [ ] Register/Login works
- [ ] Can create menu items
- [ ] Can create customers
- [ ] Can create orders
- [ ] Can toggle order status
- [ ] Dashboard shows statistics
- [ ] Can edit all entities
- [ ] Can delete all entities

## 🎓 Assessment Criteria Met

✅ Laravel Breeze authentication
✅ CRUD for Menu, Orders, Customers
✅ Order status toggle (pending/delivered)
✅ Dashboard with total orders and top items
✅ Relationships (order-menu-customer)
✅ Blade templates with stats

---

**Ready to go!** Start with `php artisan serve` and visit http://localhost:8000
