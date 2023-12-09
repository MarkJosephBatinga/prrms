<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EnStudent;

class EnStudentsSeeder extends Seeder
{
    public function run()
    {
        EnStudent::create([
            'student_type' => 'Regular',
            'student_status' => 'Enrolled',
            'name' => 'John Doe',
            'nationality' => 'US',
            'address' => '123 Main St',
            'mobile_number' => '123-456-7890',
            'program' => 'Masters in Computer Science',
            'file_record' => 'ABC123',
            'payment_mode' => 'Online',
        ]);

        EnStudent::create([
            'student_type' => 'Regular',
            'student_status' => 'Enrolled',
            'name' => 'Jane Smith',
            'nationality' => 'Canada',
            'address' => '456 Oak St',
            'mobile_number' => '987-654-3210',
            'program' => 'Doctors in Business Administration',
            'file_record' => 'XYZ789',
            'payment_mode' => 'Cash',
        ]);

        EnStudent::create([
            'student_type' => 'Regular',
            'student_status' => 'Enrolled',
            'name' => 'Alice Johnson',
            'nationality' => 'UK',
            'address' => '789 Pine St',
            'mobile_number' => '555-123-4567',
            'program' => 'Doctor of Philisophy in Mathematics',
            'file_record' => 'MNO456',
            'payment_mode' => 'Credit Card',
        ]);

        EnStudent::create([
            'student_type' => 'Regular',
            'student_status' => 'Enrolled',
            'name' => 'Bob Williams',
            'nationality' => 'Australia',
            'address' => '987 Elm St',
            'mobile_number' => '222-333-4444',
            'program' => 'Doctor of Science in Physics',
            'file_record' => 'PQR789',
            'payment_mode' => 'Online',
        ]);

        EnStudent::create([
            'student_type' => 'Regular',
            'student_status' => 'Enrolled',
            'name' => 'Eva Anderson',
            'nationality' => 'Sweden',
            'address' => '567 Birch St',
            'mobile_number' => '777-888-9999',
            'program' => 'Doctor of Science in Chemistry',
            'file_record' => 'EFG234',
            'payment_mode' => 'Cash',
        ]);

        EnStudent::create([
            'student_type' => 'Regular',
            'student_status' => 'Enrolled',
            'name' => 'Zack Turner',
            'nationality' => 'Germany',
            'address' => '654 Pine St',
            'mobile_number' => '555-111-2222',
            'program' => 'Doctor of Science in Engineering',
            'file_record' => 'ZYX987',
            'payment_mode' => 'Credit Card',
        ]);

        EnStudent::create([
            'student_type' => 'Regular',
            'student_status' => 'Enrolled',
            'name' => 'Lily White',
            'nationality' => 'France',
            'address' => '876 Cedar St',
            'mobile_number' => '333-444-5555',
            'program' => 'Doctor of Philisophy in Psychology',
            'file_record' => 'LMN345',
            'payment_mode' => 'Cash',
        ]);

        EnStudent::create([
            'student_type' => 'Regular',
            'student_status' => 'Enrolled',
            'name' => 'Max Brown',
            'nationality' => 'Italy',
            'address' => '234 Maple St',
            'mobile_number' => '888-999-0000',
            'program' => 'Doctor of Science in Political Science',
            'file_record' => 'JKL678',
            'payment_mode' => 'Online',
        ]);

        EnStudent::create([
            'student_type' => 'Regular',
            'student_status' => 'Enrolled',
            'name' => 'Sophie Green',
            'nationality' => 'Spain',
            'address' => '345 Birch St',
            'mobile_number' => '111-222-3333',
            'program' => 'Doctor of Philisophy in Sociology',
            'file_record' => 'OPQ901',
            'payment_mode' => 'Credit Card',
        ]);

        EnStudent::create([
            'student_type' => 'Regular',
            'student_status' => 'Enrolled',
            'name' => 'Andrew Black',
            'nationality' => 'Netherlands',
            'address' => '567 Cedar St',
            'mobile_number' => '444-555-6666',
            'program' => 'Doctor of Philisophy in History',
            'file_record' => 'RST234',
            'payment_mode' => 'Cash',
        ]);

        EnStudent::create([
            'student_type' => 'Regular',
            'student_status' => 'Enrolled',
            'name' => 'Emma Turner',
            'nationality' => 'Belgium',
            'address' => '789 Pine St',
            'mobile_number' => '777-888-9999',
            'program' => 'Doctor of Philisophy in English Literature',
            'file_record' => 'UVW567',
            'payment_mode' => 'Online',
        ]);
    }
}

