<?php

namespace Database\Seeders;

use App\Models\ContentItem;
use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class WhyPageSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            'fa' => [
                'title' => 'چرا عمر حمیدی',
                'intro' => 'ترکیبی از اعتبار قانونی، کیفیت بین‌المللی، شبکه توزیع سراسری و تیم متخصص — دلایلی که ما را به شریک مطمئن سکتور صحت تبدیل کرده است.',
                'closing' => 'برای تأمین محصولات دوایی، نمایندگی ولایتی یا همکاری استراتژیک، تیم ما آماده پاسخگویی است.',
            ],
            'en' => [
                'title' => 'Why Omar Hamidi',
                'intro' => 'A blend of legal credibility, international quality standards, nationwide distribution, and a specialized team — reasons that make us a trusted partner for the health sector.',
                'closing' => 'For pharmaceutical supply, provincial representation, or strategic partnership, our team is ready to assist.',
            ],
        ] as $locale => $fields) {
            foreach ($fields as $key => $value) {
                SiteContent::query()->updateOrCreate(
                    ['section' => 'why', 'field_key' => $key, 'locale' => $locale],
                    ['value' => $value]
                );
            }
        }

        ContentItem::query()->where('section', 'why')->where('locale', 'fa')->delete();
        foreach ([
            ['اعتبار قانونی و رسمی', 'ثبت‌شده نزد وزارت صنعت و تجارت، وزارت صحت عامه، و عضویت طلایی اتاق تجارت افغانستان.'],
            ['کیفیت مطابق معیارهای بین‌المللی', 'رعایت WHO، GMP و ISO و همکاری با تولیدکنندگان معتبر جهانی.'],
            ['شبکه توزیع سراسری', '۲۹ نمایندگی رسمی و پوشش مؤثر در ۳۴ ولایت با دفاتر کابل، هرات و مزار شریف.'],
            ['زنجیره تأمین قابل اعتماد', 'نگهداری معیاری، مدیریت زنجیره سرد، و تحویل به‌موقع حتی به مناطق دورافتاده.'],
            ['تیم متخصص و حرفه‌ای', 'ترکیبی از داکتران، فارمسیستان و متخصصان لوژستیک، مالی و روابط بین‌المللی.'],
            ['قیمت رقابتی همراه با کیفیت', 'دسترسی به منابع معتبر جهانی با قیمت‌گذاری متناسب با بازار افغانستان.'],
        ] as $index => [$title, $description]) {
            ContentItem::query()->create([
                'section' => 'why',
                'locale' => 'fa',
                'title' => $title,
                'description' => $description,
                'sort_order' => $index,
            ]);
        }

        ContentItem::query()->where('section', 'why')->where('locale', 'en')->delete();
        foreach ([
            ['Legal credibility', 'Registered with the Ministry of Industry and Commerce, MoPH, and gold membership in the Afghanistan Chamber of Commerce.'],
            ['International quality standards', 'Aligned with WHO, GMP, and ISO, partnering with reputable global manufacturers.'],
            ['Nationwide distribution', '29 official agencies and effective coverage across 34 provinces, with offices in Kabul, Herat, and Mazar-e-Sharif.'],
            ['Reliable supply chain', 'Standard storage, cold-chain management, and timely delivery even to remote areas.'],
            ['Specialized professional team', 'Doctors, pharmacists, and specialists in logistics, finance, and international relations.'],
            ['Competitive pricing with quality', 'Access to trusted global sources with pricing suited to the Afghan market.'],
        ] as $index => [$title, $description]) {
            ContentItem::query()->create([
                'section' => 'why',
                'locale' => 'en',
                'title' => $title,
                'description' => $description,
                'sort_order' => $index,
            ]);
        }
    }
}
