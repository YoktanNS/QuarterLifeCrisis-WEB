<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Symptom;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $symptoms = [
            // Kategori 1: Kebingungan Identitas Diri (category_id: 1)
            ['category_id' => 1, 'code' => 'G01', 'statement' => 'Saya merasa bingung tentang siapa diri saya sebenarnya dan apa yang benar-benar saya inginkan dalam hidup'],
            ['category_id' => 1, 'code' => 'G02', 'statement' => 'Saya sering membandingkan pencapaian hidup saya dengan teman-teman sebaya dan merasa jauh tertinggal'],
            ['category_id' => 1, 'code' => 'G03', 'statement' => 'Saya merasa hidup saya tidak memiliki arah atau tujuan yang jelas'],
            ['category_id' => 1, 'code' => 'G04', 'statement' => 'Nilai-nilai dan prinsip hidup saya terasa tidak stabil atau terus berubah'],
            
            // Kategori 2: Krisis Karir & Tujuan Hidup (category_id: 2)
            ['category_id' => 2, 'code' => 'G05', 'statement' => 'Saya merasa tidak tahu harus melangkah ke mana setelah menyelesaikan studi atau dalam pekerjaan saya saat ini'],
            ['category_id' => 2, 'code' => 'G06', 'statement' => 'Saya merasa sangat takut membuat keputusan karir karena khawatir salah pilih dan menyesal'],
            ['category_id' => 2, 'code' => 'G07', 'statement' => 'Pekerjaan atau studi saya saat ini terasa tidak sesuai dengan minat, bakat, atau passion saya'],
            ['category_id' => 2, 'code' => 'G08', 'statement' => 'Saya menunda-nunda (prokrastinasi) mengambil keputusan atau tindakan nyata karena terlalu banyak pilihan yang membingungkan'],
            
            // Kategori 3: Tekanan Finansial & Kemandirian (category_id: 3)
            ['category_id' => 3, 'code' => 'G09', 'statement' => 'Saya merasa tertekan dengan tuntutan untuk segera mandiri secara finansial'],
            ['category_id' => 3, 'code' => 'G10', 'statement' => 'Saya khawatir berlebihan tentang kondisi keuangan dan kemampuan saya untuk mencukupi kebutuhan hidup sendiri'],
            ['category_id' => 3, 'code' => 'G11', 'statement' => 'Saya merasa terjebak dalam situasi finansial yang tidak ideal dan tidak tahu bagaimana cara memperbaikinya'],
            ['category_id' => 3, 'code' => 'G12', 'statement' => 'Saya takut tidak akan pernah mencapai standar kehidupan yang saya (atau keluarga saya) impikan'],
            
            // Kategori 4: Tekanan Sosial & Hubungan (category_id: 4)
            ['category_id' => 4, 'code' => 'G13', 'statement' => 'Saya merasa sangat tertekan oleh ekspektasi keluarga atau lingkungan sosial tentang apa yang harus saya capai pada usia ini'],
            ['category_id' => 4, 'code' => 'G14', 'statement' => 'Saya merasa kesepian atau terisolasi secara emosional, meskipun secara fisik dikelilingi banyak orang'],
            ['category_id' => 4, 'code' => 'G15', 'statement' => 'Saya mengalami kekhawatiran tentang hubungan romantis (belum memiliki pasangan, atau merasa tidak yakin dengan hubungan yang sedang dijalani)'],
            ['category_id' => 4, 'code' => 'G16', 'statement' => 'Saya merasa hubungan pertemanan saya semakin renggang dan sulit dipertahankan sejak memasuki fase baru kehidupan'],
            
            // Kategori 5: Distress Psikologis & Eksistensial (category_id: 5)
            ['category_id' => 5, 'code' => 'G17', 'statement' => 'Saya sering merasa cemas, gelisah, atau tidak tenang bahkan ketika tidak ada ancaman nyata yang sedang terjadi'],
            ['category_id' => 5, 'code' => 'G18', 'statement' => 'Saya mempertanyakan makna dan tujuan keberadaan saya di dunia ini'],
            ['category_id' => 5, 'code' => 'G19', 'statement' => 'Saya mengalami gangguan tidur (sulit tidur atau tidur berlebihan) atau perubahan nafsu makan yang cukup signifikan akibat pikiran-pikiran yang mengganggu'],
            ['category_id' => 5, 'code' => 'G20', 'statement' => 'Saya merasa putus asa atau tidak berdaya dalam menghadapi masa depan saya'],
        ];

        foreach ($symptoms as $symptom) {
            Symptom::create($symptom);
        }
    }
}
