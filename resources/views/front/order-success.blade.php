@extends('front.layouts.app')

@section('title', 'تم الطلب بنجاح - Ghada Beauty')

@section('noindex', true)

@section('content')
<div class="container mx-auto px-4 py-16 text-center">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-8">
        <div class="text-6xl mb-4">✅</div>
        <h1 class="text-4xl font-bold mb-4 text-teal-500">تم استلام طلبك بنجاح!</h1>
        <p class="text-xl text-gray-600 mb-8">رقم الطلب: #{{ $order->id }}</p>
        <p class="text-gray-600 mb-8">سيتم التواصل معك قريباً لتأكيد الطلب</p>
        <div class="flex gap-4 justify-center">
            <a href="{{ route('home') }}" class="btn-primary">العودة للرئيسية</a>
            <a href="{{ route('products.index') }}" class="btn-secondary">تصفح المزيد</a>
        </div>
    </div>
</div>
@endsection

