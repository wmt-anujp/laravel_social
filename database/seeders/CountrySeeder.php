<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->truncate();

        $countries = [
            ['country_name' => 'Afghanistan', 'code' => 'AF'],
            ['country_name' => 'Åland Islands', 'code' => 'AX'],
            ['country_name' => 'Albania', 'code' => 'AL'],
            ['country_name' => 'Algeria', 'code' => 'DZ'],
            ['country_name' => 'American Samoa', 'code' => 'AS'],
            ['country_name' => 'Andorra', 'code' => 'AD'],
            ['country_name' => 'Angola', 'code' => 'AO'],
            ['country_name' => 'Anguilla', 'code' => 'AI'],
            ['country_name' => 'Antarctica', 'code' => 'AQ'],
            ['country_name' => 'Antigua and Barbuda', 'code' => 'AG'],
            ['country_name' => 'Argentina', 'code' => 'AR'],
            ['country_name' => 'Armenia', 'code' => 'AM'],
            ['country_name' => 'Aruba', 'code' => 'AW'],
            ['country_name' => 'Australia', 'code' => 'AU'],
            ['country_name' => 'Austria', 'code' => 'AT'],
            ['country_name' => 'Azerbaijan', 'code' => 'AZ'],
            ['country_name' => 'Bahamas', 'code' => 'BS'],
            ['country_name' => 'Bahrain', 'code' => 'BH'],
            ['country_name' => 'Bangladesh', 'code' => 'BD'],
            ['country_name' => 'Barbados', 'code' => 'BB'],
            ['country_name' => 'Belarus', 'code' => 'BY'],
            ['country_name' => 'Belgium', 'code' => 'BE'],
            ['country_name' => 'Belize', 'code' => 'BZ'],
            ['country_name' => 'Benin', 'code' => 'BJ'],
            ['country_name' => 'Bermuda', 'code' => 'BM'],
            ['country_name' => 'Bhutan', 'code' => 'BT'],
            ['country_name' => 'Bolivia, Plurinational State of', 'code' => 'BO'],
            ['country_name' => 'Bonaire, Sint Eustatius and Saba', 'code' => 'BQ'],
            ['country_name' => 'Bosnia and Herzegovina', 'code' => 'BA'],
            ['country_name' => 'Botswana', 'code' => 'BW'],
            ['country_name' => 'Bouvet Island', 'code' => 'BV'],
            ['country_name' => 'Brazil', 'code' => 'BR'],
            ['country_name' => 'British Indian Ocean Territory', 'code' => 'IO'],
            ['country_name' => 'Brunei Darussalam', 'code' => 'BN'],
            ['country_name' => 'Bulgaria', 'code' => 'BG'],
            ['country_name' => 'Burkina Faso', 'code' => 'BF'],
            ['country_name' => 'Burundi', 'code' => 'BI'],
            ['country_name' => 'Cambodia', 'code' => 'KH'],
            ['country_name' => 'Cameroon', 'code' => 'CM'],
            ['country_name' => 'Canada', 'code' => 'CA'],
            ['country_name' => 'Cape Verde', 'code' => 'CV'],
            ['country_name' => 'Cayman Islands', 'code' => 'KY'],
            ['country_name' => 'Central African Republic', 'code' => 'CF'],
            ['country_name' => 'Chad', 'code' => 'TD'],
            ['country_name' => 'Chile', 'code' => 'CL'],
            ['country_name' => 'China', 'code' => 'CN'],
            ['country_name' => 'Christmas Island', 'code' => 'CX'],
            ['country_name' => 'Cocos (Keeling) Islands', 'code' => 'CC'],
            ['country_name' => 'Colombia', 'code' => 'CO'],
            ['country_name' => 'Comoros', 'code' => 'KM'],
            ['country_name' => 'Congo', 'code' => 'CG'],
            ['country_name' => 'Congo, the Democratic Republic of the', 'code' => 'CD'],
            ['country_name' => 'Cook Islands', 'code' => 'CK'],
            ['country_name' => 'Costa Rica', 'code' => 'CR'],
            ['country_name' => 'Côte d\'Ivoire', 'code' => 'CI'],
            ['country_name' => 'Croatia', 'code' => 'HR'],
            ['country_name' => 'Cuba', 'code' => 'CU'],
            ['country_name' => 'Curaçao', 'code' => 'CW'],
            ['country_name' => 'Cyprus', 'code' => 'CY'],
            ['country_name' => 'Czech Republic', 'code' => 'CZ'],
            ['country_name' => 'Denmark', 'code' => 'DK'],
            ['country_name' => 'Djibouti', 'code' => 'DJ'],
            ['country_name' => 'Dominica', 'code' => 'DM'],
            ['country_name' => 'Dominican Republic', 'code' => 'DO'],
            ['country_name' => 'Ecuador', 'code' => 'EC'],
            ['country_name' => 'Egypt', 'code' => 'EG'],
            ['country_name' => 'El Salvador', 'code' => 'SV'],
            ['country_name' => 'Equatorial Guinea', 'code' => 'GQ'],
            ['country_name' => 'Eritrea', 'code' => 'ER'],
            ['country_name' => 'Estonia', 'code' => 'EE'],
            ['country_name' => 'Ethiopia', 'code' => 'ET'],
            ['country_name' => 'Falkland Islands (Malvinas)', 'code' => 'FK'],
            ['country_name' => 'Faroe Islands', 'code' => 'FO'],
            ['country_name' => 'Fiji', 'code' => 'FJ'],
            ['country_name' => 'Finland', 'code' => 'FI'],
            ['country_name' => 'France', 'code' => 'FR'],
            ['country_name' => 'French Guiana', 'code' => 'GF'],
            ['country_name' => 'French Polynesia', 'code' => 'PF'],
            ['country_name' => 'French Southern Territories', 'code' => 'TF'],
            ['country_name' => 'Gabon', 'code' => 'GA'],
            ['country_name' => 'Gambia', 'code' => 'GM'],
            ['country_name' => 'Georgia', 'code' => 'GE'],
            ['country_name' => 'Germany', 'code' => 'DE'],
            ['country_name' => 'Ghana', 'code' => 'GH'],
            ['country_name' => 'Gibraltar', 'code' => 'GI'],
            ['country_name' => 'Greece', 'code' => 'GR'],
            ['country_name' => 'Greenland', 'code' => 'GL'],
            ['country_name' => 'Grenada', 'code' => 'GD'],
            ['country_name' => 'Guadeloupe', 'code' => 'GP'],
            ['country_name' => 'Guam', 'code' => 'GU'],
            ['country_name' => 'Guatemala', 'code' => 'GT'],
            ['country_name' => 'Guernsey', 'code' => 'GG'],
            ['country_name' => 'Guinea', 'code' => 'GN'],
            ['country_name' => 'Guinea-Bissau', 'code' => 'GW'],
            ['country_name' => 'Guyana', 'code' => 'GY'],
            ['country_name' => 'Haiti', 'code' => 'HT'],
            ['country_name' => 'Heard Island and McDonald Mcdonald Islands', 'code' => 'HM'],
            ['country_name' => 'Holy See (Vatican City State)', 'code' => 'VA'],
            ['country_name' => 'Honduras', 'code' => 'HN'],
            ['country_name' => 'Hong Kong', 'code' => 'HK'],
            ['country_name' => 'Hungary', 'code' => 'HU'],
            ['country_name' => 'Iceland', 'code' => 'IS'],
            ['country_name' => 'India', 'code' => 'IN'],
            ['country_name' => 'Indonesia', 'code' => 'ID'],
            ['country_name' => 'Iran, Islamic Republic of', 'code' => 'IR'],
            ['country_name' => 'Iraq', 'code' => 'IQ'],
            ['country_name' => 'Ireland', 'code' => 'IE'],
            ['country_name' => 'Isle of Man', 'code' => 'IM'],
            ['country_name' => 'Israel', 'code' => 'IL'],
            ['country_name' => 'Italy', 'code' => 'IT'],
            ['country_name' => 'Jamaica', 'code' => 'JM'],
            ['country_name' => 'Japan', 'code' => 'JP'],
            ['country_name' => 'Jersey', 'code' => 'JE'],
            ['country_name' => 'Jordan', 'code' => 'JO'],
            ['country_name' => 'Kazakhstan', 'code' => 'KZ'],
            ['country_name' => 'Kenya', 'code' => 'KE'],
            ['country_name' => 'Kiribati', 'code' => 'KI'],
            ['country_name' => 'Korea, Democratic People\'s Republic of', 'code' => 'KP'],
            ['country_name' => 'Korea, Republic of', 'code' => 'KR'],
            ['country_name' => 'Kuwait', 'code' => 'KW'],
            ['country_name' => 'Kyrgyzstan', 'code' => 'KG'],
            ['country_name' => 'Lao People\'s Democratic Republic', 'code' => 'LA'],
            ['country_name' => 'Latvia', 'code' => 'LV'],
            ['country_name' => 'Lebanon', 'code' => 'LB'],
            ['country_name' => 'Lesotho', 'code' => 'LS'],
            ['country_name' => 'Liberia', 'code' => 'LR'],
            ['country_name' => 'Libya', 'code' => 'LY'],
            ['country_name' => 'Liechtenstein', 'code' => 'LI'],
            ['country_name' => 'Lithuania', 'code' => 'LT'],
            ['country_name' => 'Luxembourg', 'code' => 'LU'],
            ['country_name' => 'Macao', 'code' => 'MO'],
            ['country_name' => 'Macedonia, the Former Yugoslav Republic of', 'code' => 'MK'],
            ['country_name' => 'Madagascar', 'code' => 'MG'],
            ['country_name' => 'Malawi', 'code' => 'MW'],
            ['country_name' => 'Malaysia', 'code' => 'MY'],
            ['country_name' => 'Maldives', 'code' => 'MV'],
            ['country_name' => 'Mali', 'code' => 'ML'],
            ['country_name' => 'Malta', 'code' => 'MT'],
            ['country_name' => 'Marshall Islands', 'code' => 'MH'],
            ['country_name' => 'Martinique', 'code' => 'MQ'],
            ['country_name' => 'Mauritania', 'code' => 'MR'],
            ['country_name' => 'Mauritius', 'code' => 'MU'],
            ['country_name' => 'Mayotte', 'code' => 'YT'],
            ['country_name' => 'Mexico', 'code' => 'MX'],
            ['country_name' => 'Micronesia, Federated States of', 'code' => 'FM'],
            ['country_name' => 'Moldova, Republic of', 'code' => 'MD'],
            ['country_name' => 'Monaco', 'code' => 'MC'],
            ['country_name' => 'Mongolia', 'code' => 'MN'],
            ['country_name' => 'Montenegro', 'code' => 'ME'],
            ['country_name' => 'Montserrat', 'code' => 'MS'],
            ['country_name' => 'Morocco', 'code' => 'MA'],
            ['country_name' => 'Mozambique', 'code' => 'MZ'],
            ['country_name' => 'Myanmar', 'code' => 'MM'],
            ['country_name' => 'Namibia', 'code' => 'NA'],
            ['country_name' => 'Nauru', 'code' => 'NR'],
            ['country_name' => 'Nepal', 'code' => 'NP'],
            ['country_name' => 'Netherlands', 'code' => 'NL'],
            ['country_name' => 'New Caledonia', 'code' => 'NC'],
            ['country_name' => 'New Zealand', 'code' => 'NZ'],
            ['country_name' => 'Nicaragua', 'code' => 'NI'],
            ['country_name' => 'Niger', 'code' => 'NE'],
            ['country_name' => 'Nigeria', 'code' => 'NG'],
            ['country_name' => 'Niue', 'code' => 'NU'],
            ['country_name' => 'Norfolk Island', 'code' => 'NF'],
            ['country_name' => 'Northern Mariana Islands', 'code' => 'MP'],
            ['country_name' => 'Norway', 'code' => 'NO'],
            ['country_name' => 'Oman', 'code' => 'OM'],
            ['country_name' => 'Pakistan', 'code' => 'PK'],
            ['country_name' => 'Palau', 'code' => 'PW'],
            ['country_name' => 'Palestine, State of', 'code' => 'PS'],
            ['country_name' => 'Panama', 'code' => 'PA'],
            ['country_name' => 'Papua New Guinea', 'code' => 'PG'],
            ['country_name' => 'Paraguay', 'code' => 'PY'],
            ['country_name' => 'Peru', 'code' => 'PE'],
            ['country_name' => 'Philippines', 'code' => 'PH'],
            ['country_name' => 'Pitcairn', 'code' => 'PN'],
            ['country_name' => 'Poland', 'code' => 'PL'],
            ['country_name' => 'Portugal', 'code' => 'PT'],
            ['country_name' => 'Puerto Rico', 'code' => 'PR'],
            ['country_name' => 'Qatar', 'code' => 'QA'],
            ['country_name' => 'Réunion', 'code' => 'RE'],
            ['country_name' => 'Romania', 'code' => 'RO'],
            ['country_name' => 'Russian Federation', 'code' => 'RU'],
            ['country_name' => 'Rwanda', 'code' => 'RW'],
            ['country_name' => 'Saint Barthélemy', 'code' => 'BL'],
            ['country_name' => 'Saint Helena, Ascension and Tristan da Cunha', 'code' => 'SH'],
            ['country_name' => 'Saint Kitts and Nevis', 'code' => 'KN'],
            ['country_name' => 'Saint Lucia', 'code' => 'LC'],
            ['country_name' => 'Saint Martin (French part)', 'code' => 'MF'],
            ['country_name' => 'Saint Pierre and Miquelon', 'code' => 'PM'],
            ['country_name' => 'Saint Vincent and the Grenadines', 'code' => 'VC'],
            ['country_name' => 'Samoa', 'code' => 'WS'],
            ['country_name' => 'San Marino', 'code' => 'SM'],
            ['country_name' => 'Sao Tome and Principe', 'code' => 'ST'],
            ['country_name' => 'Saudi Arabia', 'code' => 'SA'],
            ['country_name' => 'Senegal', 'code' => 'SN'],
            ['country_name' => 'Serbia', 'code' => 'RS'],
            ['country_name' => 'Seychelles', 'code' => 'SC'],
            ['country_name' => 'Sierra Leone', 'code' => 'SL'],
            ['country_name' => 'Singapore', 'code' => 'SG'],
            ['country_name' => 'Sint Maarten (Dutch part)', 'code' => 'SX'],
            ['country_name' => 'Slovakia', 'code' => 'SK'],
            ['country_name' => 'Slovenia', 'code' => 'SI'],
            ['country_name' => 'Solomon Islands', 'code' => 'SB'],
            ['country_name' => 'Somalia', 'code' => 'SO'],
            ['country_name' => 'South Africa', 'code' => 'ZA'],
            ['country_name' => 'South Georgia and the South Sandwich Islands', 'code' => 'GS'],
            ['country_name' => 'South Sudan', 'code' => 'SS'],
            ['country_name' => 'Spain', 'code' => 'ES'],
            ['country_name' => 'Sri Lanka', 'code' => 'LK'],
            ['country_name' => 'Sudan', 'code' => 'SD'],
            ['country_name' => 'Suricountry_name', 'code' => 'SR'],
            ['country_name' => 'Svalbard and Jan Mayen', 'code' => 'SJ'],
            ['country_name' => 'Swaziland', 'code' => 'SZ'],
            ['country_name' => 'Sweden', 'code' => 'SE'],
            ['country_name' => 'Switzerland', 'code' => 'CH'],
            ['country_name' => 'Syrian Arab Republic', 'code' => 'SY'],
            ['country_name' => 'Taiwan', 'code' => 'TW'],
            ['country_name' => 'Tajikistan', 'code' => 'TJ'],
            ['country_name' => 'Tanzania, United Republic of', 'code' => 'TZ'],
            ['country_name' => 'Thailand', 'code' => 'TH'],
            ['country_name' => 'Timor-Leste', 'code' => 'TL'],
            ['country_name' => 'Togo', 'code' => 'TG'],
            ['country_name' => 'Tokelau', 'code' => 'TK'],
            ['country_name' => 'Tonga', 'code' => 'TO'],
            ['country_name' => 'Trinidad and Tobago', 'code' => 'TT'],
            ['country_name' => 'Tunisia', 'code' => 'TN'],
            ['country_name' => 'Turkey', 'code' => 'TR'],
            ['country_name' => 'Turkmenistan', 'code' => 'TM'],
            ['country_name' => 'Turks and Caicos Islands', 'code' => 'TC'],
            ['country_name' => 'Tuvalu', 'code' => 'TV'],
            ['country_name' => 'Uganda', 'code' => 'UG'],
            ['country_name' => 'Ukraine', 'code' => 'UA'],
            ['country_name' => 'United Arab Emirates', 'code' => 'AE'],
            ['country_name' => 'United Kingdom', 'code' => 'GB'],
            ['country_name' => 'United States', 'code' => 'US'],
            ['country_name' => 'United States Minor Outlying Islands', 'code' => 'UM'],
            ['country_name' => 'Uruguay', 'code' => 'UY'],
            ['country_name' => 'Uzbekistan', 'code' => 'UZ'],
            ['country_name' => 'Vanuatu', 'code' => 'VU'],
            ['country_name' => 'Venezuela, Bolivarian Republic of', 'code' => 'VE'],
            ['country_name' => 'Viet Nam', 'code' => 'VN'],
            ['country_name' => 'Virgin Islands, British', 'code' => 'VG'],
            ['country_name' => 'Virgin Islands, U.S.', 'code' => 'VI'],
            ['country_name' => 'Wallis and Futuna', 'code' => 'WF'],
            ['country_name' => 'Western Sahara', 'code' => 'EH'],
            ['country_name' => 'Yemen', 'code' => 'YE'],
            ['country_name' => 'Zambia', 'code' => 'ZM'],
            ['country_name' => 'Zimbabwe', 'code' => 'ZW'],
        ];

        DB::table('countries')->insert($countries);
    }
}
