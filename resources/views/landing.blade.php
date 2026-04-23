@extends('layouts.app')

@section('content')
<div class="space-y-24 pb-12">
    
    <section class="text-center pt-16 md:pt-24 max-w-4xl mx-auto px-4">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sage/10 text-sage-dark text-sm font-medium mb-6">
            <span>Sistem Pendukung Keputusan Berbasis Pakar</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-extrabold text-ink tracking-tight mb-6 leading-tight">
            Navigasi Arah Hidup Anda di Fase <span class="text-sage">Quarter-Life Crisis</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-600 mb-10 leading-relaxed max-w-2xl mx-auto">
            Sebuah instrumen evaluasi psikologis mandiri. Sistem ini menggunakan algoritma Forward Chaining dan Simple Additive Weighting (SAW) untuk menganalisis tingkat krisis Anda dan memberikan rekomendasi tindakan yang terukur.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('assessment.index') }}" class="w-full sm:w-auto px-8 py-4 bg-sage hover:bg-sage-dark text-white font-semibold rounded-lg shadow-md transition duration-300 transform hover:-translate-y-1">
                Mulai Asesmen Sekarang
            </a>
            <a href="#cara-kerja" class="w-full sm:w-auto px-8 py-4 bg-transparent border-2 border-sage text-sage hover:bg-sage/5 font-semibold rounded-lg transition duration-300">
                Pelajari Cara Kerja
            </a>
        </div>
    </section>

    <section id="cara-kerja" class="max-w-6xl mx-auto px-4 scroll-mt-20">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-ink mb-4">Arsitektur Analisis Sistem</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Bagaimana sistem memproses respons Anda menjadi sebuah kesimpulan dan rekomendasi yang valid secara metodologis.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-surface p-8 rounded-2xl border border-beige-dark shadow-sm hover:shadow-md transition duration-300">
                <div class="w-12 h-12 bg-sage/10 text-sage-dark rounded-xl flex items-center justify-center font-bold text-xl mb-6">
                    1
                </div>
                <h3 class="text-xl font-bold text-ink mb-3">Pengumpulan Data (Likert)</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                    Sistem mengumpulkan intensitas gejala yang Anda rasakan menggunakan kuesioner terstruktur dengan Skala Likert, memastikan presisi data melebihi sistem biner biasa.
                </p>
            </div>

            <div class="bg-surface p-8 rounded-2xl border border-beige-dark shadow-sm hover:shadow-md transition duration-300">
                <div class="w-12 h-12 bg-sage/10 text-sage-dark rounded-xl flex items-center justify-center font-bold text-xl mb-6">
                    2
                </div>
                <h3 class="text-xl font-bold text-ink mb-3">Mesin Inferensi (FC)</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                    Algoritma Forward Chaining memproses basis pengetahuan (Rule Base) dari pakar untuk menyimpulkan klasifikasi tingkat Quarter-Life Crisis Anda secara akurat.
                </p>
            </div>

            <div class="bg-surface p-8 rounded-2xl border border-beige-dark shadow-sm hover:shadow-md transition duration-300">
                <div class="w-12 h-12 bg-sage/10 text-sage-dark rounded-xl flex items-center justify-center font-bold text-xl mb-6">
                    3
                </div>
                <h3 class="text-xl font-bold text-ink mb-3">Perankingan Solusi (SAW)</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                    Metode Simple Additive Weighting menghitung matriks kriteria (Efektivitas, Waktu, Biaya) untuk memberikan rekomendasi *Action Plan* yang paling optimal bagi Anda.
                </p>
            </div>
        </div>
    </section>

</div>
@endsection