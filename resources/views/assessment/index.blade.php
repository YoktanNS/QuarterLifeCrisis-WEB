@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="text-center max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-sage-dark mb-3">Asesmen Kondisi Anda</h1>
        <p class="text-gray-600 leading-relaxed">
            Pilih pernyataan di bawah ini yang paling mewakili perasaan dan kondisi Anda dalam 6 bulan terakhir. Jawablah dengan jujur untuk mendapatkan rekomendasi yang paling akurat.
        </p>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md shadow-sm">
            <div class="flex items-center">
                <div class="ml-3">
                    <p class="text-sm text-red-700 font-medium">
                        {{ $errors->first('symptoms') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('assessment.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            @foreach ($categories as $category)
                <div class="bg-surface rounded-xl shadow-sm border border-beige-dark overflow-hidden transition duration-300 hover:shadow-md">
                    <div class="bg-sage/10 px-6 py-4 border-b border-beige-dark">
                        <h2 class="text-lg font-semibold text-sage-dark">{{ $category->name }}</h2>
                        <p class="text-sm text-gray-500 mt-1">{{ $category->description }}</p>
                    </div>
                    
                    <div class="divide-y divide-beige-dark">
                        @foreach ($category->symptoms as $symptom)
                            <label class="flex items-start px-6 py-4 cursor-pointer hover:bg-beige/30 transition">
                                <div class="flex-shrink-0 mt-1">
                                    <input type="checkbox" name="symptoms[]" value="{{ $symptom->id }}" 
                                        class="w-5 h-5 text-sage border-gray-300 rounded focus:ring-sage focus:ring-opacity-50 transition duration-150 ease-in-out">
                                </div>
                                <div class="ml-4">
                                    <span class="text-base text-ink leading-snug">{{ $symptom->statement }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 flex justify-center">
            <button type="submit" class="bg-sage hover:bg-sage-dark text-white font-semibold py-3 px-10 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                Proses Hasil Asesmen
            </button>
        </div>
    </form>
</div>
@endsection