<?php

namespace Database\Seeders;

use App\Models\ContentItem;
use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class EnglishContentSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            'hero' => [
                'title' => 'Omar Hamidi Ltd',
                'tagline' => 'Your health, our commitment — proudly serving the community',
                'text' => 'Reliable supply of quality medicines and medical equipment across Afghanistan, supporting the health sector with safe, effective products aligned with international standards.',
                'cta_primary' => 'Products & Services',
                'cta_secondary' => 'Partner with us',
                'stat_1_value' => '2006',
                'stat_1_label' => 'Founded',
                'stat_2_value' => '29',
                'stat_2_label' => 'Official agencies',
                'stat_3_value' => '34',
                'stat_3_label' => 'Provinces covered',
                'image' => 'images/hamidi/warehouse.png',
            ],
            'about' => [
                'title' => 'A trusted institution in healthcare import and distribution',
                'p1' => 'Omar Hamidi Trading Ltd is an officially registered company with the Ministry of Industry and Commerce of Afghanistan under TIN 9027556795. The company is also registered with the Ministry of Public Health and holds gold membership in the Afghanistan Chamber of Commerce and Industry.',
                'p2' => 'It is recognized as a reliable institution in importing, supplying, and distributing pharmaceuticals, medical equipment, and other healthcare products. A strong commitment to quality has built broad trust among doctors, pharmacists, and healthcare professionals nationwide.',
                'p3' => 'Founded in 1385 Solar Hijri (2006), the company began with a structured business plan and a professional team of doctors, pharmacists, and specialists in finance, logistics, IT, and domestic and international relations.',
                'leadership_title' => 'Committed to community health',
                'leadership_name' => 'Leadership Board',
                'ceo_name' => 'Mohammad Halim Moshfiq',
                'vice_name' => 'Shah Wali Hamidi',
                'leadership_message' => "At Omar Hamidi Trading Ltd, we are committed to ensuring reliable access to high-quality medicines and medical equipment across Afghanistan. Our mission is to support the health sector by supplying safe, effective products that meet international standards.\n\nWith a strong network of trusted international partners and an experienced professional team, we continuously strengthen our supply chain and expand services nationwide. We focus on quality assurance, proper storage, and timely distribution to provincial representatives, hospitals, pharmacies, and other health centers.\n\nInspired by a shared vision based on quality, integrity, and innovation, company leadership is committed to contributing to the growth of the national health system through teamwork and continuous improvement.",
                'vision' => 'To become a leading company in pharmaceuticals and healthcare services at national and regional levels, known for innovation, credibility, reliability, and commitment to international standards, playing an effective role in improving health systems and quality of life.',
                'mission' => 'To provide high-quality, effective, and accessible pharmaceutical products that improve public health, while upholding international standards, promoting innovation, and building lasting trust with patients, healthcare professionals, and business partners.',
                'values' => "Quality\nIntegrity & Transparency\nInnovation\nAccountability\nCustomer Focus\nSocial Responsibility",
                'philosophy_title' => 'Quality is our identity',
                'philosophy_text' => 'We believe human life has the highest value. Any negligence at any stage can directly affect people\'s lives; therefore, we are committed to the highest standards of quality and responsibility. For us, quality is not merely a goal — it is our identity.',
                'commitments' => "Quality\nIntegrity\nLeadership\nCommitment\nRespect\nHumanity",
                'image' => 'images/hamidi/reception.png',
                'leadership_image' => 'images/hamidi/leadership.png',
            ],
            'products' => [
                'title' => 'Products & Services',
                'intro' => 'All supplied products are registered according to national and international regulations and are widely used in both public and private sectors.',
                'quality_items' => "Compliance with WHO, GMP, and ISO standards\nPartnership with reputable global manufacturers\nAuthenticity and quality assurance\nCold chain preservation and management\nStrict quality control across procurement, transport, and storage\nProduct tracking and traceability systems",
                'advantage_items' => "Access to trusted global sources and quality brands\nCompetitive pricing suited to the Afghan market\nTimely delivery through an effective logistics system\nStrong relationships with hospitals, pharmacies, and medical warehouses\nExperienced, specialized professional team\nFull compliance with MoPH regulations",
                'goals' => "Supply high-quality medicines aligned with international standards\nImprove patient access to safe and effective medicines\nBuild long-term partnerships with reputable global manufacturers\nEnsure full compliance with MoPH, GMP, and ISO requirements\nExpand an effective nationwide distribution network\nOffer competitive prices while preserving quality\nStrengthen quality assurance systems across all operations\nSupport the national health system and increase customer satisfaction",
            ],
            'network' => [
                'title' => 'Effective coverage across 34 provinces',
                'p1' => 'Omar Hamidi Trading Ltd has 29 official agencies and nationwide coverage across all provinces of Afghanistan. Central offices and major warehousing facilities are located in Kabul (head office), Herat, and Mazar-e-Sharif.',
                'p2' => 'With sufficient logistics capacity and equipment, the company can reliably and timely distribute medical products even to remote areas.',
                'offices' => 'Kabul — Head Office · Herat · Mazar-e-Sharif',
                'competitive' => "Direct access to reputable international manufacturers\nStrong quality assurance and full regulatory compliance\nCompetitive and cost-effective pricing\nReliable, sustainable, and effective supply chain\nStandard-compliant warehouses and storage facilities\nBroad and diverse product portfolio\nProfessional, specialized advisory team\nTransparency, trust, and credibility in all operations",
                'markets' => "Hospitals and clinics\nDoctors and healthcare specialists\nPharmacies\nProvincial representatives\nNational and international organizations\nGovernment institutions\nPharmaceutical manufacturers\nDistributors and wholesalers",
                'image' => 'images/hamidi/healthcare.png',
            ],
            'licenses' => [
                'intro' => 'The company holds an import activity license for medicines and medical equipment, as well as a trading license from the Ministry of Industry and Commerce.',
                'license_no' => '10021',
                'tin' => '9027556795',
                'ceo_name' => 'Mohammad Halim Moshfiq',
                'vice_name' => 'Shah Wali Hamidi',
                'commerce_caption' => 'Trading License — Ministry of Industry and Commerce',
                'moph_caption' => 'Import Activity License — Ministry of Public Health',
                'commerce_image' => 'images/hamidi/license-commerce.png',
                'moph_image' => 'images/hamidi/license-moph.png',
            ],
            'partners' => [
                'title' => 'Working with trusted manufacturers',
                'intro' => 'The company has established direct commercial relations with leading international manufacturers, including Pharmigo, Safe Pharma, and Medco Health Care Co.',
            ],
            'contact' => [
                'title' => 'We are ready to work with you',
                'intro' => 'Contact us for product supply, provincial representation, or strategic partnership.',
                'email' => 'omarhamidi380@gmail.com',
                'phone_1' => '+93 798 303 024',
                'phone_2' => '+93 799 870 375',
                'hq_title' => 'Head Office — Kabul',
                'hq_address' => 'Shahr-e-Naw, Haji Yaqub Square, District 4, Kabul',
                'hq_address_extra' => 'Kabul Plaza, 1st Floor (District 11)',
                'regional_offices' => 'Kabul · Herat · Mazar-e-Sharif — with agency coverage in 34 provinces',
            ],
            'settings' => [
                'company_fa' => 'Omar Hamidi Trading Ltd',
                'company_en' => 'Omar Hamidi Trading Ltd',
                'site_tagline' => 'Your health, our commitment — proudly serving the community',
                'founded' => '2006 / 1385',
                'meta_description' => 'Omar Hamidi Trading Ltd — import, supply, and distribution of pharmaceuticals, medical equipment, and healthcare products across Afghanistan. Established 2006.',
                'footer_copy' => 'Omar Hamidi Trading Ltd. All rights reserved.',
            ],
        ];

        foreach ($sections as $section => $fields) {
            foreach ($fields as $key => $value) {
                SiteContent::query()->updateOrCreate(
                    ['section' => $section, 'field_key' => $key, 'locale' => 'en'],
                    ['value' => $value]
                );
            }
        }

        ContentItem::query()->where('section', 'products')->where('locale', 'en')->delete();
        foreach ([
            ['Pharmaceutical products', 'Chemical and herbal medicines — tablets, capsules, syrups, suspensions, and injectables.', 'images/hamidi/pharma-products.png'],
            ['Raw materials', 'Raw materials required by pharmaceutical manufacturing companies.', 'images/hamidi/saline.png'],
            ['Medical equipment', 'Surgical instruments, medical machines, and patient-care equipment for hospitals and clinics.', 'images/hamidi/equipment.png'],
            ['Healthcare products', 'Infant formula, cereals, and related consumer healthcare products.', 'images/hamidi/healthcare.png'],
        ] as $index => [$title, $description, $image]) {
            ContentItem::query()->create([
                'section' => 'products',
                'locale' => 'en',
                'title' => $title,
                'description' => $description,
                'image' => $image,
                'sort_order' => $index,
            ]);
        }

        ContentItem::query()->where('section', 'partners')->where('locale', 'en')->delete();
        foreach (['Pharmigo', 'Safe Pharma', 'Medco Health Care'] as $index => $title) {
            ContentItem::query()->create([
                'section' => 'partners',
                'locale' => 'en',
                'title' => $title,
                'sort_order' => $index,
            ]);
        }
    }
}
