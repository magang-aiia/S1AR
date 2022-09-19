<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = [
            'Operator/Leader' => 1,
            'Supervisor' => 2,
            'Manager' => 3,
            'Group Manager' => 4,
            'Director' => 5,
            'Vice President Dir' => 6,
            'President Director' => 7,
            'Admin' => 8,
        ];

        Jabatan::create([
            'kode' => 'ADMIN',
            'nama' => 'Admin',
            'atasan_kode' => null,
            'level_user_id' => $level['Admin'],
        ]);

        Jabatan::create([
            'kode' => 'PD',
            'nama' => 'President Director',
            'atasan_kode' => null,
            'level_user_id' => $level['President Director'],
        ]);

        Jabatan::create([
            'kode' => 'VPD',
            'nama' => 'Vice President Director',
            'atasan_kode' => 'PD',
            'level_user_id' => $level['Vice President Dir'],
        ]);

        Jabatan::create([
            'kode' => 'MKT',
            'nama' => 'Marketing & Purchasing Director',
            'atasan_kode' => 'VPD',
            'level_user_id' => $level['Director'],
        ]);

        Jabatan::create([
            'kode' => 'ADM',
            'nama' => 'Administration Director',
            'atasan_kode' => 'VPD',
            'level_user_id' => $level['Director'],
        ]);

        Jabatan::create([
            'kode' => 'PLT',
            'nama' => 'Plant Director',
            'atasan_kode' => 'VPD',
            'level_user_id' => $level['Director'],
        ]);

        Jabatan::create([
            'kode' => 'MKT-GM',
            'nama' => 'Marketing & Purchasing Group Manager',
            'atasan_kode' => 'MKT',
            'level_user_id' => $level['Group Manager'],
        ]);

        Jabatan::create([
            'kode' => 'ADM-GM',
            'nama' => 'Administration Group Manager',
            'atasan_kode' => 'ADM',
            'level_user_id' => $level['Group Manager'],
        ]);

        Jabatan::create([
            'kode' => 'ENG',
            'nama' => 'Enginnering',
            'atasan_kode' => 'PLT',
            'level_user_id' => $level['Group Manager'],
        ]);

        Jabatan::create([
            'kode' => 'PRD',
            'nama' => 'Production',
            'atasan_kode' => 'PLT',
            'level_user_id' => $level['Group Manager'],
        ]);

        Jabatan::create([
            'kode' => 'HRG',
            'nama' => 'HR & GA',
            'atasan_kode' => 'ADM-GM',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'IRL',
            'nama' => 'Internal Relation & Legal',
            'atasan_kode' => 'ADM-GM',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'MKT-MGR',
            'nama' => 'Marketing Manager',
            'atasan_kode' => 'ADM-GM',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'FNA',
            'nama' => 'Finance & Accounting',
            'atasan_kode' => 'ADM-GM',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'PCE',
            'nama' => 'Purchasing & Exim',
            'atasan_kode' => 'ADM-GM',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'NPL',
            'nama' => 'New Project & Localization',
            'atasan_kode' => 'ADM-GM',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'BDC',
            'nama' => 'Body Component',
            'atasan_kode' => 'PRD',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'PUM',
            'nama' => 'Production Unit Machining',
            'atasan_kode' => 'PRD',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'PPC',
            'nama' => 'PPC',
            'atasan_kode' => 'PRD',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'EGB',
            'nama' => 'Enginnering Body',
            'atasan_kode' => 'ENG',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'EGU',
            'nama' => 'Enginnering Unit',
            'atasan_kode' => 'ENG',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'MTE',
            'nama' => 'Maintenance',
            'atasan_kode' => 'ENG',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'QBC',
            'nama' => 'QA Body Component',
            'atasan_kode' => 'ENG',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'QAS',
            'nama' => 'QA Management System',
            'atasan_kode' => 'ENG',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'QEC',
            'nama' => 'QA Engine Component',
            'atasan_kode' => 'ENG',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'ITD',
            'nama' => 'IT Development',
            'atasan_kode' => 'ENG',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'OMD',
            'nama' => 'OMD',
            'atasan_kode' => 'PRD',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'PUD',
            'nama' => 'Production Unit Die Casting',
            'atasan_kode' => 'PRD',
            'level_user_id' => $level['Manager'],
        ]);

        Jabatan::create([
            'kode' => 'HG1',
            'nama' => 'Personal Admin',
            'atasan_kode' => 'HRG',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'HG2',
            'nama' => 'Training & PD',
            'atasan_kode' => 'HRG',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'HG3',
            'nama' => 'Recruitment & OD',
            'atasan_kode' => 'HRG',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'HG4',
            'nama' => 'GA',
            'atasan_kode' => 'HRG',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'HG5',
            'nama' => 'Secretary',
            'atasan_kode' => 'HRG',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'IR1',
            'nama' => 'Internal Relation',
            'atasan_kode' => 'IRL',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'IR2',
            'nama' => 'Legal',
            'atasan_kode' => 'IRL',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'MK1',
            'nama' => 'Marketing',
            'atasan_kode' => 'MKT-MGR',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'FA1',
            'nama' => 'Cost Control',
            'atasan_kode' => 'FNA',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'FA2',
            'nama' => 'Corporate Planning',
            'atasan_kode' => 'FNA',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'FA3',
            'nama' => 'Finance',
            'atasan_kode' => 'FNA',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'FA4',
            'nama' => 'Accounting',
            'atasan_kode' => 'FNA',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PC1',
            'nama' => 'General Purchase',
            'atasan_kode' => 'PCE',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PC2',
            'nama' => 'Exim & MRP',
            'atasan_kode' => 'PCE',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PC3',
            'nama' => 'MRP',
            'atasan_kode' => 'PCE',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'NP1',
            'nama' => 'NPL-1 (Unit)',
            'atasan_kode' => 'NPL',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'NP2',
            'nama' => 'NPL-2 (Body 1)',
            'atasan_kode' => 'NPL',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'NP3',
            'nama' => 'NPL-3 (Body 2)',
            'atasan_kode' => 'NPL',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PB1',
            'nama' => 'Handle & Assy',
            'atasan_kode' => 'BDC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PB2',
            'nama' => 'Injection',
            'atasan_kode' => 'BDC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PU1',
            'nama' => 'Die Casting',
            'atasan_kode' => 'PUD',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PU2',
            'nama' => 'Machining Assy',
            'atasan_kode' => 'PUM',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'OM1',
            'nama' => 'OMD SPV',
            'atasan_kode' => 'OMD',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PP1',
            'nama' => 'Project Planning',
            'atasan_kode' => 'PPC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PP2',
            'nama' => 'Body L&S',
            'atasan_kode' => 'PPC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PP3',
            'nama' => 'Unit L&S',
            'atasan_kode' => 'PPC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'EB1',
            'nama' => 'Body Interior & Exterior',
            'atasan_kode' => 'EGB',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'EB2',
            'nama' => 'Body Functional',
            'atasan_kode' => 'EGB',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'EB3',
            'nama' => 'Body Project & Document Control',
            'atasan_kode' => 'EGB',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'EC1',
            'nama' => 'Engine Component',
            'atasan_kode' => 'EGU',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'ME1',
            'nama' => 'Machine',
            'atasan_kode' => 'MTE',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'ME2',
            'nama' => 'Die Mold',
            'atasan_kode' => 'MTE',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'ME3',
            'nama' => 'Safety & Environment',
            'atasan_kode' => 'QAS',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'QB1',
            'nama' => 'QA Component',
            'atasan_kode' => 'QBC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'QS1',
            'nama' => 'QA Support & ISO TS',
            'atasan_kode' => 'QAS',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'QU1',
            'nama' => 'QA Engine Component',
            'atasan_kode' => 'QBC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'QU2',
            'nama' => 'QA Engine Component',
            'atasan_kode' => 'QEC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'IT1',
            'nama' => 'Information Support',
            'atasan_kode' => 'ITD',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'IT2',
            'nama' => 'Infrastructure Support',
            'atasan_kode' => 'ITD',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PB3',
            'nama' => 'Painting',
            'atasan_kode' => 'BDC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PB4',
            'nama' => 'Seat Motor',
            'atasan_kode' => 'BDC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PB5',
            'nama' => 'PSD',
            'atasan_kode' => 'BDC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'EC2',
            'nama' => 'Development',
            'atasan_kode' => 'EGU',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'PB6',
            'nama' => '3 Pillar',
            'atasan_kode' => 'BDC',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'MS1',
            'nama' => 'IRL & Covid',
            'atasan_kode' => 'QAS',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'MS2',
            'nama' => 'General Affair',
            'atasan_kode' => 'QAS',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'MS3',
            'nama' => 'Internal Training',
            'atasan_kode' => 'QAS',
            'level_user_id' => $level['Supervisor'],
        ]);

        Jabatan::create([
            'kode' => 'HG11',
            'nama' => 'Personal Admin (OP/LD)',
            'atasan_kode' => 'HG1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'HG21',
            'nama' => 'Training & PD (OP/LD)',
            'atasan_kode' => 'HG2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'HG31',
            'nama' => 'Recruitmen & OD (OP/LD)',
            'atasan_kode' => 'HG3',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'HG41',
            'nama' => 'GA (OP/LD)',
            'atasan_kode' => 'HG4',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'MK11',
            'nama' => 'Marketing (OP/LD)',
            'atasan_kode' => 'MK1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'FA11',
            'nama' => 'Cost Control (OP/LD)',
            'atasan_kode' => 'FA1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'FA21',
            'nama' => 'Corporate Planning (OP/LD)',
            'atasan_kode' => 'FA2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'FA31',
            'nama' => 'Invoicing',
            'atasan_kode' => 'FA3',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'FA32',
            'nama' => 'Casier',
            'atasan_kode' => 'FA3',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'FA33',
            'nama' => 'Finance Admin',
            'atasan_kode' => 'FA3',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'FA41',
            'nama' => 'General ACC & TAX',
            'atasan_kode' => 'FA4',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'FA42',
            'nama' => 'Cost Inventory Control',
            'atasan_kode' => 'FA4',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PC11',
            'nama' => 'General Purchase (OP/LD)',
            'atasan_kode' => 'PC1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PC21',
            'nama' => 'Exim & MRP (OP/LD)',
            'atasan_kode' => 'PC2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PC31',
            'nama' => 'MRP (OP/LD)',
            'atasan_kode' => 'PC3',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PB11',
            'nama' => 'Handle & Assy (OP/LD)',
            'atasan_kode' => 'PB1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PB51',
            'nama' => 'PSD (OP/LD)',
            'atasan_kode' => 'PB5',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PB41',
            'nama' => 'Seat Motor (OP/LD)',
            'atasan_kode' => 'PB4',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PB21',
            'nama' => 'Injection (OP/LD)',
            'atasan_kode' => 'PB2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PB31',
            'nama' => 'Painting (OP/LD)',
            'atasan_kode' => 'PB3',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PU11',
            'nama' => 'Die Casting A,B (OP/LD)',
            'atasan_kode' => 'PU1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PU12',
            'nama' => 'Melting (OP/LD)',
            'atasan_kode' => 'PU1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PU21',
            'nama' => 'Machining A,B,C (OP/LD)',
            'atasan_kode' => 'PU2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PU22',
            'nama' => 'Assembly A,B,C (OP/LD)',
            'atasan_kode' => 'PU2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'OM11',
            'nama' => 'Unit (OP/LD)',
            'atasan_kode' => 'OM1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'OM12',
            'nama' => 'Body (OP/LD)',
            'atasan_kode' => 'OM1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'OM13',
            'nama' => 'Workshop (OP/LD)',
            'atasan_kode' => 'OM1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PP11',
            'nama' => 'PPIC Body Project Leader',
            'atasan_kode' => 'PP1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PP12',
            'nama' => 'PPIC Unit Project Leader',
            'atasan_kode' => 'PP1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PP21',
            'nama' => 'PPIC Body - Warehouse',
            'atasan_kode' => 'PP2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PP22',
            'nama' => 'PPIC Body - Delivery A',
            'atasan_kode' => 'PP2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PP23',
            'nama' => 'PPIC Body - Delivery B',
            'atasan_kode' => 'PP2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PP31',
            'nama' => 'PPIC Unit A',
            'atasan_kode' => 'PP3',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PP32',
            'nama' => 'PPIC Unit B',
            'atasan_kode' => 'PP3',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'EB11',
            'nama' => 'Painting (OP/LD)',
            'atasan_kode' => 'EB1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'EB12',
            'nama' => 'Body Assy 1 (OP/LD)',
            'atasan_kode' => 'EB1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'EB21',
            'nama' => 'Body Assy 2 (OP/LD)',
            'atasan_kode' => 'EB2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'EB22',
            'nama' => 'Injection (OP/LD)',
            'atasan_kode' => 'EB2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'EB31',
            'nama' => 'Project & Document Control',
            'atasan_kode' => 'EB3',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'EC11',
            'nama' => 'Machining & Assembly (OP/LD)',
            'atasan_kode' => 'EC1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'EC12',
            'nama' => 'Melting & Die Casting (OP/LD)',
            'atasan_kode' => 'EC1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'EC13',
            'nama' => 'Design & Support OMD (OP/LD)',
            'atasan_kode' => 'EC1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'ME11',
            'nama' => 'Unit (OP/LD)',
            'atasan_kode' => 'ME1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'ME12',
            'nama' => 'Utility & Building (OP/LD)',
            'atasan_kode' => 'ME1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'ME13',
            'nama' => 'Storage & Training (OP/LD)',
            'atasan_kode' => 'ME1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'ME21',
            'nama' => 'Die & Mold (OP/LD)',
            'atasan_kode' => 'ME2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'ME31',
            'nama' => 'Safety (OP/LD)',
            'atasan_kode' => 'ME3',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'QB11',
            'nama' => 'QA Internal Process & Handling',
            'atasan_kode' => 'QB1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'QB12',
            'nama' => 'New Project',
            'atasan_kode' => 'QB1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'QS11',
            'nama' => 'QA Support & ISO TS (OP/LD)',
            'atasan_kode' => 'QS1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'QU11',
            'nama' => 'Casting Line',
            'atasan_kode' => 'QU1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'QU12',
            'nama' => 'Machining',
            'atasan_kode' => 'QU1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'QU13',
            'nama' => 'Assy Line',
            'atasan_kode' => 'QU1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'QU14',
            'nama' => 'Receiving Line',
            'atasan_kode' => 'QU1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'QU21',
            'nama' => 'Warranty Line',
            'atasan_kode' => 'QU2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'IT11',
            'nama' => 'Administrasi System',
            'atasan_kode' => 'IT1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'IT12',
            'nama' => 'Plant System',
            'atasan_kode' => 'IT1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'IT21',
            'nama' => 'Body & Admin Support',
            'atasan_kode' => 'IT2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'IT22',
            'nama' => 'Office & Unit Support',
            'atasan_kode' => 'IT2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'ME14',
            'nama' => 'Body (OP/LD)',
            'atasan_kode' => 'ME1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'ME32',
            'nama' => 'Environment (OP/LD)',
            'atasan_kode' => 'ME3',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'NP11',
            'nama' => 'New Project localization | NPL',
            'atasan_kode' => 'NP1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'EC21',
            'nama' => 'Improvement (OP/LD)',
            'atasan_kode' => 'EC2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'PB61',
            'nama' => '3 Pillar (OP/LD)',
            'atasan_kode' => 'PB6',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'MS11',
            'nama' => 'IRL & Covid (OP/LD)',
            'atasan_kode' => 'MS1',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'MS21',
            'nama' => 'General Affair (OP/LD)',
            'atasan_kode' => 'MS2',
            'level_user_id' => $level['Operator/Leader'],
        ]);

        Jabatan::create([
            'kode' => 'MS31',
            'nama' => 'Internal Training(OP/LD)',
            'atasan_kode' => 'MS3',
            'level_user_id' => $level['Operator/Leader'],
        ]);
    }
}
