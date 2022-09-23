<?php

namespace Database\Seeders;

use App\Models\Bagian;
use Illuminate\Database\Seeder;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $jabatan = [
            'Operator/Leader' => 1,
            'Supervisor' => 2,
            'Manager' => 3,
            'Group Manager' => 4,
            'Director' => 5,
            'Vice President Dir' => 6,
            'President Director' => 7,
            'Admin' => 8,
        ];

        Bagian::create([
            'kode' => 'ADMIN',
            'nama' => 'Admin',
            'atasan_kode' => null,
            'jabatan_id' => $jabatan['Admin'],
        ]);

        Bagian::create([
            'kode' => 'PD',
            'nama' => 'President Director',
            'atasan_kode' => null,
            'jabatan_id' => $jabatan['President Director'],
        ]);

        Bagian::create([
            'kode' => 'VPD',
            'nama' => 'Vice President Director',
            'atasan_kode' => 'PD',
            'jabatan_id' => $jabatan['Vice President Dir'],
        ]);

        Bagian::create([
            'kode' => 'MKT',
            'nama' => 'Marketing & Purchasing Director',
            'atasan_kode' => 'VPD',
            'jabatan_id' => $jabatan['Director'],
        ]);

        Bagian::create([
            'kode' => 'ADM',
            'nama' => 'Administration Director',
            'atasan_kode' => 'VPD',
            'jabatan_id' => $jabatan['Director'],
        ]);

        Bagian::create([
            'kode' => 'PLT',
            'nama' => 'Plant Director',
            'atasan_kode' => 'VPD',
            'jabatan_id' => $jabatan['Director'],
        ]);

        Bagian::create([
            'kode' => 'MKT-GM',
            'nama' => 'Marketing & Purchasing Group Manager',
            'atasan_kode' => 'MKT',
            'jabatan_id' => $jabatan['Group Manager'],
        ]);

        Bagian::create([
            'kode' => 'ADM-GM',
            'nama' => 'Administration Group Manager',
            'atasan_kode' => 'ADM',
            'jabatan_id' => $jabatan['Group Manager'],
        ]);

        Bagian::create([
            'kode' => 'ENG',
            'nama' => 'Enginnering',
            'atasan_kode' => 'PLT',
            'jabatan_id' => $jabatan['Group Manager'],
        ]);

        Bagian::create([
            'kode' => 'PRD',
            'nama' => 'Production',
            'atasan_kode' => 'PLT',
            'jabatan_id' => $jabatan['Group Manager'],
        ]);

        Bagian::create([
            'kode' => 'HRG',
            'nama' => 'HR & GA',
            'atasan_kode' => 'ADM-GM',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'IRL',
            'nama' => 'Internal Relation & Legal',
            'atasan_kode' => 'ADM-GM',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'MKT-MGR',
            'nama' => 'Marketing Manager',
            'atasan_kode' => 'ADM-GM',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'FNA',
            'nama' => 'Finance & Accounting',
            'atasan_kode' => 'ADM-GM',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'PCE',
            'nama' => 'Purchasing & Exim',
            'atasan_kode' => 'ADM-GM',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'NPL',
            'nama' => 'New Project & Localization',
            'atasan_kode' => 'ADM-GM',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'BDC',
            'nama' => 'Body Component',
            'atasan_kode' => 'PRD',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'PUM',
            'nama' => 'Production Unit Machining',
            'atasan_kode' => 'PRD',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'PPC',
            'nama' => 'PPC',
            'atasan_kode' => 'PRD',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'EGB',
            'nama' => 'Enginnering Body',
            'atasan_kode' => 'ENG',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'EGU',
            'nama' => 'Enginnering Unit',
            'atasan_kode' => 'ENG',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'MTE',
            'nama' => 'Maintenance',
            'atasan_kode' => 'ENG',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'QBC',
            'nama' => 'QA Body Component',
            'atasan_kode' => 'ENG',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'QAS',
            'nama' => 'QA Management System',
            'atasan_kode' => 'ENG',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'QEC',
            'nama' => 'QA Engine Component',
            'atasan_kode' => 'ENG',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'ITD',
            'nama' => 'IT Development',
            'atasan_kode' => 'ENG',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'OMD',
            'nama' => 'OMD',
            'atasan_kode' => 'PRD',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'PUD',
            'nama' => 'Production Unit Die Casting',
            'atasan_kode' => 'PRD',
            'jabatan_id' => $jabatan['Manager'],
        ]);

        Bagian::create([
            'kode' => 'HG1',
            'nama' => 'Personal Admin',
            'atasan_kode' => 'HRG',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'HG2',
            'nama' => 'Training & PD',
            'atasan_kode' => 'HRG',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'HG3',
            'nama' => 'Recruitment & OD',
            'atasan_kode' => 'HRG',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'HG4',
            'nama' => 'GA',
            'atasan_kode' => 'HRG',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'HG5',
            'nama' => 'Secretary',
            'atasan_kode' => 'HRG',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'IR1',
            'nama' => 'Internal Relation',
            'atasan_kode' => 'IRL',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'IR2',
            'nama' => 'Legal',
            'atasan_kode' => 'IRL',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'MK1',
            'nama' => 'Marketing',
            'atasan_kode' => 'MKT-MGR',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'FA1',
            'nama' => 'Cost Control',
            'atasan_kode' => 'FNA',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'FA2',
            'nama' => 'Corporate Planning',
            'atasan_kode' => 'FNA',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'FA3',
            'nama' => 'Finance',
            'atasan_kode' => 'FNA',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'FA4',
            'nama' => 'Accounting',
            'atasan_kode' => 'FNA',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PC1',
            'nama' => 'General Purchase',
            'atasan_kode' => 'PCE',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PC2',
            'nama' => 'Exim & MRP',
            'atasan_kode' => 'PCE',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PC3',
            'nama' => 'MRP',
            'atasan_kode' => 'PCE',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'NP1',
            'nama' => 'NPL-1 (Unit)',
            'atasan_kode' => 'NPL',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'NP2',
            'nama' => 'NPL-2 (Body 1)',
            'atasan_kode' => 'NPL',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'NP3',
            'nama' => 'NPL-3 (Body 2)',
            'atasan_kode' => 'NPL',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PB1',
            'nama' => 'Handle & Assy',
            'atasan_kode' => 'BDC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PB2',
            'nama' => 'Injection',
            'atasan_kode' => 'BDC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PU1',
            'nama' => 'Die Casting',
            'atasan_kode' => 'PUD',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PU2',
            'nama' => 'Machining Assy',
            'atasan_kode' => 'PUM',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'OM1',
            'nama' => 'OMD SPV',
            'atasan_kode' => 'OMD',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PP1',
            'nama' => 'Project Planning',
            'atasan_kode' => 'PPC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PP2',
            'nama' => 'Body L&S',
            'atasan_kode' => 'PPC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PP3',
            'nama' => 'Unit L&S',
            'atasan_kode' => 'PPC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'EB1',
            'nama' => 'Body Interior & Exterior',
            'atasan_kode' => 'EGB',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'EB2',
            'nama' => 'Body Functional',
            'atasan_kode' => 'EGB',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'EB3',
            'nama' => 'Body Project & Document Control',
            'atasan_kode' => 'EGB',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'EC1',
            'nama' => 'Engine Component',
            'atasan_kode' => 'EGU',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'ME1',
            'nama' => 'Machine',
            'atasan_kode' => 'MTE',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'ME2',
            'nama' => 'Die Mold',
            'atasan_kode' => 'MTE',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'ME3',
            'nama' => 'Safety & Environment',
            'atasan_kode' => 'QAS',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'QB1',
            'nama' => 'QA Component',
            'atasan_kode' => 'QBC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'QS1',
            'nama' => 'QA Support & ISO TS',
            'atasan_kode' => 'QAS',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'QU1',
            'nama' => 'QA Engine Component',
            'atasan_kode' => 'QBC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'QU2',
            'nama' => 'QA Engine Component',
            'atasan_kode' => 'QEC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'IT1',
            'nama' => 'Information Support',
            'atasan_kode' => 'ITD',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'IT2',
            'nama' => 'Infrastructure Support',
            'atasan_kode' => 'ITD',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PB3',
            'nama' => 'Painting',
            'atasan_kode' => 'BDC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PB4',
            'nama' => 'Seat Motor',
            'atasan_kode' => 'BDC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PB5',
            'nama' => 'PSD',
            'atasan_kode' => 'BDC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'EC2',
            'nama' => 'Development',
            'atasan_kode' => 'EGU',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'PB6',
            'nama' => '3 Pillar',
            'atasan_kode' => 'BDC',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'MS1',
            'nama' => 'IRL & Covid',
            'atasan_kode' => 'QAS',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'MS2',
            'nama' => 'General Affair',
            'atasan_kode' => 'QAS',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'MS3',
            'nama' => 'Internal Training',
            'atasan_kode' => 'QAS',
            'jabatan_id' => $jabatan['Supervisor'],
        ]);

        Bagian::create([
            'kode' => 'HG11',
            'nama' => 'Personal Admin (OP/LD)',
            'atasan_kode' => 'HG1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'HG21',
            'nama' => 'Training & PD (OP/LD)',
            'atasan_kode' => 'HG2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'HG31',
            'nama' => 'Recruitmen & OD (OP/LD)',
            'atasan_kode' => 'HG3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'HG41',
            'nama' => 'GA (OP/LD)',
            'atasan_kode' => 'HG4',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'MK11',
            'nama' => 'Marketing (OP/LD)',
            'atasan_kode' => 'MK1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'FA11',
            'nama' => 'Cost Control (OP/LD)',
            'atasan_kode' => 'FA1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'FA21',
            'nama' => 'Corporate Planning (OP/LD)',
            'atasan_kode' => 'FA2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'FA31',
            'nama' => 'Invoicing',
            'atasan_kode' => 'FA3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'FA32',
            'nama' => 'Casier',
            'atasan_kode' => 'FA3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'FA33',
            'nama' => 'Finance Admin',
            'atasan_kode' => 'FA3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'FA41',
            'nama' => 'General ACC & TAX',
            'atasan_kode' => 'FA4',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'FA42',
            'nama' => 'Cost Inventory Control',
            'atasan_kode' => 'FA4',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PC11',
            'nama' => 'General Purchase (OP/LD)',
            'atasan_kode' => 'PC1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PC21',
            'nama' => 'Exim & MRP (OP/LD)',
            'atasan_kode' => 'PC2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PC31',
            'nama' => 'MRP (OP/LD)',
            'atasan_kode' => 'PC3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PB11',
            'nama' => 'Handle & Assy (OP/LD)',
            'atasan_kode' => 'PB1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PB51',
            'nama' => 'PSD (OP/LD)',
            'atasan_kode' => 'PB5',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PB41',
            'nama' => 'Seat Motor (OP/LD)',
            'atasan_kode' => 'PB4',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PB21',
            'nama' => 'Injection (OP/LD)',
            'atasan_kode' => 'PB2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PB31',
            'nama' => 'Painting (OP/LD)',
            'atasan_kode' => 'PB3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PU11',
            'nama' => 'Die Casting A,B (OP/LD)',
            'atasan_kode' => 'PU1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PU12',
            'nama' => 'Melting (OP/LD)',
            'atasan_kode' => 'PU1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PU21',
            'nama' => 'Machining A,B,C (OP/LD)',
            'atasan_kode' => 'PU2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PU22',
            'nama' => 'Assembly A,B,C (OP/LD)',
            'atasan_kode' => 'PU2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'OM11',
            'nama' => 'Unit (OP/LD)',
            'atasan_kode' => 'OM1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'OM12',
            'nama' => 'Body (OP/LD)',
            'atasan_kode' => 'OM1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'OM13',
            'nama' => 'Workshop (OP/LD)',
            'atasan_kode' => 'OM1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PP11',
            'nama' => 'PPIC Body Project Leader',
            'atasan_kode' => 'PP1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PP12',
            'nama' => 'PPIC Unit Project Leader',
            'atasan_kode' => 'PP1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PP21',
            'nama' => 'PPIC Body - Warehouse',
            'atasan_kode' => 'PP2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PP22',
            'nama' => 'PPIC Body - Delivery A',
            'atasan_kode' => 'PP2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PP23',
            'nama' => 'PPIC Body - Delivery B',
            'atasan_kode' => 'PP2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PP31',
            'nama' => 'PPIC Unit A',
            'atasan_kode' => 'PP3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PP32',
            'nama' => 'PPIC Unit B',
            'atasan_kode' => 'PP3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'EB11',
            'nama' => 'Painting (OP/LD)',
            'atasan_kode' => 'EB1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'EB12',
            'nama' => 'Body Assy 1 (OP/LD)',
            'atasan_kode' => 'EB1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'EB21',
            'nama' => 'Body Assy 2 (OP/LD)',
            'atasan_kode' => 'EB2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'EB22',
            'nama' => 'Injection (OP/LD)',
            'atasan_kode' => 'EB2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'EB31',
            'nama' => 'Project & Document Control',
            'atasan_kode' => 'EB3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'EC11',
            'nama' => 'Machining & Assembly (OP/LD)',
            'atasan_kode' => 'EC1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'EC12',
            'nama' => 'Melting & Die Casting (OP/LD)',
            'atasan_kode' => 'EC1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'EC13',
            'nama' => 'Design & Support OMD (OP/LD)',
            'atasan_kode' => 'EC1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'ME11',
            'nama' => 'Unit (OP/LD)',
            'atasan_kode' => 'ME1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'ME12',
            'nama' => 'Utility & Building (OP/LD)',
            'atasan_kode' => 'ME1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'ME13',
            'nama' => 'Storage & Training (OP/LD)',
            'atasan_kode' => 'ME1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'ME21',
            'nama' => 'Die & Mold (OP/LD)',
            'atasan_kode' => 'ME2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'ME31',
            'nama' => 'Safety (OP/LD)',
            'atasan_kode' => 'ME3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'QB11',
            'nama' => 'QA Internal Process & Handling',
            'atasan_kode' => 'QB1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'QB12',
            'nama' => 'New Project',
            'atasan_kode' => 'QB1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'QS11',
            'nama' => 'QA Support & ISO TS (OP/LD)',
            'atasan_kode' => 'QS1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'QU11',
            'nama' => 'Casting Line',
            'atasan_kode' => 'QU1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'QU12',
            'nama' => 'Machining',
            'atasan_kode' => 'QU1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'QU13',
            'nama' => 'Assy Line',
            'atasan_kode' => 'QU1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'QU14',
            'nama' => 'Receiving Line',
            'atasan_kode' => 'QU1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'QU21',
            'nama' => 'Warranty Line',
            'atasan_kode' => 'QU2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'IT11',
            'nama' => 'Administrasi System',
            'atasan_kode' => 'IT1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'IT12',
            'nama' => 'Plant System',
            'atasan_kode' => 'IT1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'IT21',
            'nama' => 'Body & Admin Support',
            'atasan_kode' => 'IT2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'IT22',
            'nama' => 'Office & Unit Support',
            'atasan_kode' => 'IT2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'ME14',
            'nama' => 'Body (OP/LD)',
            'atasan_kode' => 'ME1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'ME32',
            'nama' => 'Environment (OP/LD)',
            'atasan_kode' => 'ME3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'NP11',
            'nama' => 'New Project localization | NPL',
            'atasan_kode' => 'NP1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'EC21',
            'nama' => 'Improvement (OP/LD)',
            'atasan_kode' => 'EC2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'PB61',
            'nama' => '3 Pillar (OP/LD)',
            'atasan_kode' => 'PB6',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'MS11',
            'nama' => 'IRL & Covid (OP/LD)',
            'atasan_kode' => 'MS1',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'MS21',
            'nama' => 'General Affair (OP/LD)',
            'atasan_kode' => 'MS2',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);

        Bagian::create([
            'kode' => 'MS31',
            'nama' => 'Internal Training(OP/LD)',
            'atasan_kode' => 'MS3',
            'jabatan_id' => $jabatan['Operator/Leader'],
        ]);
    }
}
