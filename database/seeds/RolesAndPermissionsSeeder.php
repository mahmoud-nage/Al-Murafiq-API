<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Reset cached roles and permissions
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    
            $collection = collect([
                'AboutUs',
                'Ad',
                'Address',
                'Admin',
                'Affilate',
                'AffilateCompany',
                'Area',
                'Bank',
                'Blog',
                'Branch',
                'BusinessSettings',
                'Category',
                'City',
                'CommentLike',
                'CompaniesApp',
                'Company',
                'CompanySubsription',
                'CompayCategory',
                'Contact',
                'Country',
                'Currency',
                'Customer',
                'File',
                'GeneralSettings',
                'Link',
                'Notification',
                'NotificationUser',
                'Partner',
                'PaymentMethod',
                'Payment',
                'Policy',
                'Resource',
                'Review',
                'Search',
                'Social',
                'Status',
                'SubCategory',
                'Subscription',
                'SubSubCategory',
                'Ticket',
                'TicketReply',
                'User',
                'Wishlist',
                'Zone',
                'roles',
                // ... your own models/permission you want to crate
            ]);
    
            $collection->each(function ($item, $key) {
                // create permissions for each collection item
                Permission::create(['group' => $item, 'name' => 'view ' . $item]);
                Permission::create(['group' => $item, 'name' => 'view own ' . $item]);
                Permission::create(['group' => $item, 'name' => 'manage ' . $item]);
                Permission::create(['group' => $item, 'name' => 'manage own ' . $item]);
                Permission::create(['group' => $item, 'name' => 'restore ' . $item]);
                Permission::create(['group' => $item, 'name' => 'forceDelete ' . $item]);
            });
    
            // Create a Super-Admin Role and assign all permissions to it
            $role = Role::create(['name' => 'super-admin']);
            $role->givePermissionTo(Permission::all());
    
            // Give User Super-Admin Role
            $user = App\User::whereEmail('SuperAdmin@mail.com')->first(); // enter your email here 
            $user->assignRole('super-admin');
        }
}
