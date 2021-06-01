<?php

use App\Models\Ability;
use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count()==0){
            factory(User::class, 1)->create();
            $names = ['إضافة مختص', 'تعديل مختص', 'حذف مختص', 'إضافة معلم','تعديل معلم','حذف معلم','إضافة طالب','عرض طالب','تعديل طالب','حذف طالب','إضافة هيئة تعليمية','عرض هيئة تعليمية','تعديل هيئة تعليمية','حذف هيئة تعليمية','إضافة جلسة','تعديل جلسة','حذف جلسة','إضافة دفعة','تعديل دفعة','حذف دفعة','تقارير','إضافة غرامة','إضافة برنامج','تعديل برنامج','حذف برنامج'];

            factory(Ability::class, 25)->create()->each(function ($ability,$key) use ($names) {
                $ability->name = $names[$key];
                $ability->save();
            });
        }
        User::first()->update(['email'=>'uo1@uo.com','password'=>'123456789']);
    }
}
