
<?php 
    $select_background_color = get_sub_field ('select_background_color');
    $section_headline = get_sub_field('section_headline');
    $headline = get_sub_field('copy_headline');
    $subheadline = get_sub_field('copy_sub_headline');
    $copy = get_sub_field('description');
    $cta = get_sub_field('cta_text');
    $image = get_sub_field( 'image' )['sizes']['large'];
    $alt =  get_sub_field( 'image' )['alt'];
    $title = get_sub_field( 'image' )['title'];
    $thankyou = get_sub_field('form_thankyou');
    $conf_msg = get_sub_field('form_conf_msg');
    $form_id = get_sub_field('form_id'); 
    $select_outcome = get_sub_field('select_outcome'); 
    $redirect_url = get_sub_field('redirect_url'); 
    $document = get_sub_field('document'); 
    $form_type = get_sub_field('form_type');
?>

<section class="custom-form <?php echo $select_background_color; ?>">
  <section id="videos-form" class="custom-form__wrapper">
    <?php if ($section_headline): ?>
    <h2 class="custom-form__wrapper__headline">
      <?php echo $section_headline; ?>
    </h2>
    <?php endif ;?>
    <div class="videos-form__block">
      <article class="videos-form__details">
        <h2 class="videos-form__headline"><?php echo $headline ;?></h2>
        <h3 class="videos-form__subheadline"><?php echo $subheadline ;?></h3>
        <div class="videos-form__description"><?php echo $copy ;?></div>
        <?php if($image) :?>
        <figure class="videos-form__fig-info">
          <img loading="lazy" src="<?php echo $image ;?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>">
        </figure>
        <?php endif ;?>
      </article>
      <div class="videos-form__form">
        <section class="form videos-form--no-bg">
          <article class="form__wrapper">
            <div class="form__wrapper__container">
              <div class="form-success-div thanks hidden">
                <h3 class="thanks__headline">
                  <?php echo $thankyou ;?>
                </h3>

                <p class="thanks__desc">
                  <?php echo $conf_msg ;?>
                </p>
              </div>

              <div class="videos-form-container">
                <input value="<?php echo $form_id ?>" type="hidden" name="elqFormName">
                <input value="716031822" type="hidden" name="elqSiteId">
                <input name="elqCampaignId" type="hidden">
                <div id="mc_embed_signup_scroll">
                  <div class="mc-field-group-wrapper display-flex flex-col-mobile">
                    <div class="mc-field-group form__helper custom-col-12-md padding-10">
                      <input type="text" class="elq-item-input form__input" name="firstName" id="fe14631" value=""
                        placeholder=" " onclick="formStart()">
                      <div class="label form__label">First Name<span>*</span></div>
                    </div>

                  </div>
                  <div class="mc-field-group-wrapper display-flex flex-col-mobile">

                    <div class="mc-field-group form__helper custom-col-12-md padding-10">
                      <input type="text" class="elq-item-input form__input" name="lastName" id="fe14632" value=""
                        placeholder=" ">
                      <div class="label form__label">Last Name<span>*</span></div>

                    </div>
                  </div>



                  <div class="mc-field-group-wrapper display-flex flex-col-mobile">
                    <div class="mc-field-group form__helper custom-col-12-md padding-10">
                      <input type="email" class="elq-item-input form__input" name="emailAddress" id="fe12855" value=""
                        placeholder=" ">
                      <div class="label form__label">Email Address<span>*</span></div>
                    </div>

                  </div>

                  <div class="mc-field-group-wrapper display-flex flex-col-mobile">

                    <div class="mc-field-group form__helper custom-col-12-md padding-10">
                      <input type="text" class="elq-item-input form__input" name="busPhone" id="fe14972" value=""
                        placeholder=" ">
                      <div class="label form__label">Business Phone<span>*</span></div>

                    </div>
                  </div>

                  <div class="mc-field-group-wrapper display-flex flex-col-mobile">
                    <div class="mc-field-group form__helper custom-col-12-md padding-10">
                      <input type="text" class="elq-item-input form__input" name="title" id="fe14973" value=""
                        placeholder=" ">
                      <div class="label form__label">Job Title<span>*</span></div>
                    </div>

                  </div>

                  <div class="mc-field-group-wrapper display-flex flex-col-mobile">

                    <div class="mc-field-group form__helper custom-col-12-md padding-10">
                      <input type="text" class="elq-item-input form__input" name="company" id="fe14974" value=""
                        placeholder=" ">
                      <div class="label form__label">Company<span>*</span></div>

                    </div>
                  </div>

                  <div class="mc-field-group-wrapper display-flex flex-col-mobile form__helper">
                    <div class="mc-field-group custom-col-12-md padding-10 form-first-select-mobile">
                      <select id="fe14975" name="industry1" class="u-full-width form__select">
                        <option value="" selected="selected">Industry<span>*</span></option>
                        <option data-type="industry" value="Accounting and Consulting">Accounting and Consulting
                        </option>
                        <option data-type="industry" value="Advertising and Public Relations">Advertising and Public
                          Relations
                        </option>
                        <option data-type="industry" value="Aerospace and Defense">Aerospace and Defense
                        </option>
                        <option data-type="industry" value="Agriculture and Forestry">Agriculture and Forestry
                        </option>
                        <option data-type="industry" value="Artificial Intelligence">Artificial Intelligence
                        </option>
                        <option data-type="industry" value="Air Transport">Air Transport
                        </option>
                        <option data-type="industry" value="Automotive">Automotive
                        </option>
                        <option data-type="industry" value="Banking and Credit">Banking and Credit
                        </option>
                        <option data-type="industry" value="Business and Consumer Services">Business and Consumer
                          Services
                        </option>
                        <option data-type="industry" value="Charity/Non-Profit">Charity/Non-Profit
                        </option>
                        <option data-type="industry" value="Chemicals">Chemicals
                        </option>
                        <option data-type="industry" value="Clothing and Textiles">Clothing and Textiles
                        </option>
                        <option data-type="industry" value="Computers/Information Technology">Computers/Information
                          Technology
                        </option>
                        <option data-type="industry" value="Construction and Real Estate">Construction and Real Estate
                        </option>
                        <option data-type="industry" value="Consulting Services">Consulting Services
                        </option>
                        <option data-type="industry" value="Consumer Products">Consumer Products
                        </option>
                        <option data-type="industry" value="Education">Education
                        </option>
                        <option data-type="industry" value="Electronics">Electronics
                        </option>
                        <option data-type="industry" value="Energy">Energy
                        </option>
                        <option data-type="industry" value="Engineering">Engineering
                        </option>
                        <option data-type="industry" value="Environment and Waste Management">Environment and Waste
                          Management
                        </option>
                        <option data-type="industry" value="Financial Services">Financial Services
                        </option>
                        <option data-type="industry" value="Fitness and Health">Fitness and Health
                        </option>
                        <option data-type="industry" value="Food Beverage and Tobacco">Food Beverage and Tobacco
                        </option>
                        <option data-type="industry" value="Gaming">Gaming
                        </option>
                        <option data-type="industry" value="Government">Government
                        </option>
                        <option data-type="industry" value="Healthcare">Healthcare
                        </option>
                        <option data-type="industry" value="Hotels Restaurants and Casinos">Hotels Restaurants and
                          Casinos
                        </option>
                        <option data-type="industry" value="Insurance">Insurance
                        </option>
                        <option data-type="industry" value="Internet and Online Services">Internet and Online Services
                        </option>
                        <option data-type="industry" value="Legal">Legal
                        </option>
                        <option data-type="industry" value="Leisure and Arts">Leisure and Arts
                        </option>
                        <option data-type="industry" value="Machinery and Industrial Goods">Machinery and Industrial
                          Goods
                        </option>
                        <option data-type="industry" value="Media">Media
                        </option>
                        <option data-type="industry" value="Metals and Mining">Metals and Mining
                        </option>
                        <option data-type="industry" value="Other">Other
                        </option>
                        <option data-type="industry" value="Pharmaceuticals">Pharmaceuticals
                        </option>
                        <option data-type="industry" value="Private Equity">Private Equity
                        </option>
                        <option data-type="industry" value="Raw Material">Raw Material
                        </option>
                        <option data-type="industry" value="Retail">Retail
                        </option>
                        <option data-type="industry" value="Security and Cybersecurity">Security and Cybersecurity
                        </option>
                        <option data-type="industry" value="Software">Software
                        </option>
                        <option data-type="industry" value="Technology">Technology
                        </option>
                        <option data-type="industry" value="Telecommunications">Telecommunications
                        </option>
                        <option data-type="industry" value="Transportation and Shipping">Transportation and Shipping
                        </option>
                        <option data-type="industry" value="Travel/Hotel/ Hospitality">Travel/Hotel/ Hospitality
                        </option>
                        <option data-type="industry" value="Utilities">Utilities
                        </option>
                        <option data-type="industry" value="Venture Capital">Venture Capital
                        </option>
                      </select>
                    </div>

                  </div>
                  <div class="mc-field-group-wrapper display-flex flex-col-mobile form__helper">

                    <div class="mc-field-group custom-col-12-md padding-10">
                      <select id="fe14976" name="country" class="u-full-width form__select">
                        <option value="" selected="selected">Country<span>*</span></option>
                        <option data-type="country" value="UNITED STATES">UNITED STATES</option>
                        <option data-type="country" value="CANADA">CANADA</option>
                        <option data-type="country" value="UNITED KINGDOM">UNITED KINGDOM</option>
                        <option data-type="country" value="FRANCE">FRANCE</option>
                        <option data-type="country" value="GERMANY">GERMANY</option>
                        <option data-type="country" value="AUSTRALIA">AUSTRALIA</option>
                        <option data-type="country" value="HONG KONG">HONG KONG</option>
                        <option data-type="country" value="INDIA">INDIA</option>
                        <option data-type="country" value="JAPAN">JAPAN</option>
                        <option data-type="country" value="SINGAPORE">SINGAPORE</option>
                        <option data-type="country" value="AFGHANISTAN">AFGHANISTAN</option>
                        <option data-type="country" value="ALBANIA">ALBANIA</option>
                        <option data-type="country" value="ALDERNEY, C.I.">ALDERNEY, C.I.</option>
                        <option data-type="country" value="ALGERIA">ALGERIA</option>
                        <option data-type="country" value="AMERICAN SAMOA">AMERICAN SAMOA</option>
                        <option data-type="country" value="ANDORRA">ANDORRA</option>
                        <option data-type="country" value="ANGOLA">ANGOLA</option>
                        <option data-type="country" value="ANGUILLA">ANGUILLA</option>
                        <option data-type="country" value="ANTARCTICA">ANTARCTICA</option>
                        <option data-type="country" value="ANTIGUA AND BARBUDA">ANTIGUA AND BARBUDA</option>
                        <option data-type="country" value="ARGENTINA">ARGENTINA</option>
                        <option data-type="country" value="ARMENIA">ARMENIA</option>
                        <option data-type="country" value="ARUBA">ARUBA</option>
                        <option data-type="country" value="AUSTRIA">AUSTRIA</option>
                        <option data-type="country" value="AZERBAIJAN">AZERBAIJAN</option>
                        <option data-type="country" value="BAHAMAS">BAHAMAS</option>
                        <option data-type="country" value="BAHRAIN">BAHRAIN</option>
                        <option data-type="country" value="BANGLADESH">BANGLADESH</option>
                        <option data-type="country" value="BARBADOS">BARBADOS</option>
                        <option data-type="country" value="BELARUS">BELARUS</option>
                        <option data-type="country" value="BELGIUM">BELGIUM</option>
                        <option data-type="country" value="BELIZE">BELIZE</option>
                        <option data-type="country" value="BENIN">BENIN</option>
                        <option data-type="country" value="BERMUDA">BERMUDA</option>
                        <option data-type="country" value="BHUTAN">BHUTAN</option>
                        <option data-type="country" value="BOLIVIA">BOLIVIA</option>
                        <option data-type="country" value="BOSNIA AND HERZEGOVINA">BOSNIA AND HERZEGOVINA</option>
                        <option data-type="country" value="BOTSWANA">BOTSWANA</option>
                        <option data-type="country" value="BOUVET ISLAND">BOUVET ISLAND</option>
                        <option data-type="country" value="BRAZIL">BRAZIL</option>
                        <option data-type="country" value="BRITISH INDIAN OCEAN TERRITORY">BRITISH INDIAN OCEAN
                          TERRITORY
                        </option>
                        <option data-type="country" value="BRUNEI DARUSSALAM">BRUNEI DARUSSALAM</option>
                        <option data-type="country" value="BULGARIA">BULGARIA</option>
                        <option data-type="country" value="BURKINA FASO">BURKINA FASO</option>
                        <option data-type="country" value="BURUNDI">BURUNDI</option>
                        <option data-type="country" value="CAMBODIA">CAMBODIA</option>
                        <option data-type="country" value="CAMEROON">CAMEROON</option>
                        <option data-type="country" value="CAPE VERDE">CAPE VERDE</option>
                        <option data-type="country" value="CAYMAN ISLANDS">CAYMAN ISLANDS</option>
                        <option data-type="country" value="CENTRAL AFRICAN REPUBLIC">CENTRAL AFRICAN REPUBLIC</option>
                        <option data-type="country" value="CHAD">CHAD</option>
                        <option data-type="country" value="CHILE">CHILE</option>
                        <option data-type="country" value="CHINA">CHINA</option>
                        <option data-type="country" value="CHRISTMAS ISLAND">CHRISTMAS ISLAND</option>
                        <option data-type="country" value="COCOS (KEELING ISLANDS)">COCOS (KEELING ISLANDS)</option>
                        <option data-type="country" value="COLOMBIA">COLOMBIA</option>
                        <option data-type="country" value="COMOROS">COMOROS</option>
                        <option data-type="country" value="CONGO">CONGO</option>
                        <option data-type="country" value="CONGO, THE DEMOCRATIC REPUBLIC">CONGO, THE DEMOCRATIC
                          REPUBLIC
                        </option>
                        <option data-type="country" value="COOK ISLANDS">COOK ISLANDS</option>
                        <option data-type="country" value="COSTA RICA">COSTA RICA</option>
                        <option data-type="country" value="COTE D'IVORE">COTE D'IVORE</option>
                        <option data-type="country" value="CROATIA">CROATIA</option>
                        <option data-type="country" value="CUBA">CUBA</option>
                        <option data-type="country" value="CYPRUS">CYPRUS</option>
                        <option data-type="country" value="CZECHIA">CZECHIA</option>
                        <option data-type="country" value="DENMARK">DENMARK</option>
                        <option data-type="country" value="DJIBOUTI">DJIBOUTI</option>
                        <option data-type="country" value="DOMINICA">DOMINICA</option>
                        <option data-type="country" value="DOMINICAN REPUBLIC">DOMINICAN REPUBLIC</option>
                        <option data-type="country" value="EAST TIMOR">EAST TIMOR</option>
                        <option data-type="country" value="ECUADOR">ECUADOR</option>
                        <option data-type="country" value="EGYPT">EGYPT</option>
                        <option data-type="country" value="EL SALVADOR">EL SALVADOR</option>
                        <option data-type="country" value="EQUATORIAL GUINEA">EQUATORIAL GUINEA</option>
                        <option data-type="country" value="ERITREA">ERITREA</option>
                        <option data-type="country" value="ESTONIA">ESTONIA</option>
                        <option data-type="country" value="ESWATINI">ESWATINI</option>
                        <option data-type="country" value="ETHIOPIA">ETHIOPIA</option>
                        <option data-type="country" value="FALKLAND ISLANDS (MALVINAS)">FALKLAND ISLANDS (MALVINAS)
                        </option>
                        <option data-type="country" value="FAROE ISLANDS">FAROE ISLANDS</option>
                        <option data-type="country" value="FIJI">FIJI</option>
                        <option data-type="country" value="FINLAND">FINLAND</option>
                        <option data-type="country" value="FRENCH GUIANA">FRENCH GUIANA</option>
                        <option data-type="country" value="FRENCH POLYNESIA">FRENCH POLYNESIA</option>
                        <option data-type="country" value="FRENCH SOUTHERN TERRITORIES">FRENCH SOUTHERN TERRITORIES
                        </option>
                        <option data-type="country" value="GABON">GABON</option>
                        <option data-type="country" value="GAMBIA">GAMBIA</option>
                        <option data-type="country" value="GEORGIA">GEORGIA</option>
                        <option data-type="country" value="GHANA">GHANA</option>
                        <option data-type="country" value="GIBRALTAR">GIBRALTAR</option>
                        <option data-type="country" value="GREECE">GREECE</option>
                        <option data-type="country" value="GREENLAND">GREENLAND</option>
                        <option data-type="country" value="GRENADA">GRENADA</option>
                        <option data-type="country" value="GUADELOUPE">GUADELOUPE</option>
                        <option data-type="country" value="GUAM">GUAM</option>
                        <option data-type="country" value="GUATEMALA">GUATEMALA</option>
                        <option data-type="country" value="GUERNSEY, C.I.">GUERNSEY, C.I.</option>
                        <option data-type="country" value="GUINEA">GUINEA</option>
                        <option data-type="country" value="GUINEA-BISSAU">GUINEA-BISSAU</option>
                        <option data-type="country" value="GUYANA">GUYANA</option>
                        <option data-type="country" value="HAITI">HAITI</option>
                        <option data-type="country" value="HEARD ISLAND AND MCDONALD ISLANDS">HEARD ISLAND AND MCDONALD
                          ISLANDS</option>
                        <option data-type="country" value="HOLY SEE (VATICAN CITY STATE)">HOLY SEE (VATICAN CITY STATE)
                        </option>
                        <option data-type="country" value="HONDURAS">HONDURAS</option>
                        <option data-type="country" value="HUNGARY">HUNGARY</option>
                        <option data-type="country" value="ICELAND">ICELAND</option>
                        <option data-type="country" value="INDONESIA">INDONESIA</option>
                        <option data-type="country" value="IRAN, ISLAMIC REPUBLIC OF">IRAN, ISLAMIC REPUBLIC OF</option>
                        <option data-type="country" value="IRAQ">IRAQ</option>
                        <option data-type="country" value="IRELAND">IRELAND</option>
                        <option data-type="country" value="ISRAEL">ISRAEL</option>
                        <option data-type="country" value="ITALY">ITALY</option>
                        <option data-type="country" value="JAMAICA">JAMAICA</option>
                        <option data-type="country" value="JERSEY, C.I.">JERSEY, C.I.</option>
                        <option data-type="country" value="JORDAN">JORDAN</option>
                        <option data-type="country" value="KASAZHSTAN">KASAZHSTAN</option>
                        <option data-type="country" value="KAZAKHSTAN">KAZAKHSTAN</option>
                        <option data-type="country" value="KENYA">KENYA</option>
                        <option data-type="country" value="KIRIBATI">KIRIBATI</option>
                        <option data-type="country" value="KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF">KOREA, DEMOCRATIC
                          PEOPLE'S REPUBLIC OF</option>
                        <option data-type="country" value="KOREA, REPUBLIC OF">KOREA, REPUBLIC OF</option>
                        <option data-type="country" value="KUWAIT">KUWAIT</option>
                        <option data-type="country" value="KYRGYZSTAN">KYRGYZSTAN</option>
                        <option data-type="country" value="LAO PEOPLES DEMOCRATIC REPUBLIC">LAO PEOPLES DEMOCRATIC
                          REPUBLIC
                        </option>
                        <option data-type="country" value="LATVIA">LATVIA</option>
                        <option data-type="country" value="LEBANON">LEBANON</option>
                        <option data-type="country" value="LESOTHO">LESOTHO</option>
                        <option data-type="country" value="LIBERIA">LIBERIA</option>
                        <option data-type="country" value="LIBYA ARAB JAMAHIRIYA">LIBYA ARAB JAMAHIRIYA</option>
                        <option data-type="country" value="LIECHTENSTEIN">LIECHTENSTEIN</option>
                        <option data-type="country" value="LITHUANIA">LITHUANIA</option>
                        <option data-type="country" value="LUXEMBOURG">LUXEMBOURG</option>
                        <option data-type="country" value="MACAU">MACAU</option>
                        <option data-type="country" value="MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF">MACEDONIA, THE
                          FORMER
                          YUGOSLAV REPUBLIC OF</option>
                        <option data-type="country" value="MADAGASCAR">MADAGASCAR</option>
                        <option data-type="country" value="MALAWI">MALAWI</option>
                        <option data-type="country" value="MALAYSIA">MALAYSIA</option>
                        <option data-type="country" value="MALDIVES">MALDIVES</option>
                        <option data-type="country" value="MALI">MALI</option>
                        <option data-type="country" value="MALTA">MALTA</option>
                        <option data-type="country" value="MARSHALL ISLANDS">MARSHALL ISLANDS</option>
                        <option data-type="country" value="MARTINIQUE">MARTINIQUE</option>
                        <option data-type="country" value="MAURITANIA">MAURITANIA</option>
                        <option data-type="country" value="MAURITIUS">MAURITIUS</option>
                        <option data-type="country" value="MAYOTTE">MAYOTTE</option>
                        <option data-type="country" value="MEXICO">MEXICO</option>
                        <option data-type="country" value="MICRONESIA, FEDERATED STATES OF">MICRONESIA, FEDERATED STATES
                          OF
                        </option>
                        <option data-type="country" value="MOLDOVA, REPUBLIC OF">MOLDOVA, REPUBLIC OF</option>
                        <option data-type="country" value="MONACO">MONACO</option>
                        <option data-type="country" value="MONGOLIA">MONGOLIA</option>
                        <option data-type="country" value="MONTENEGRO">MONTENEGRO</option>
                        <option data-type="country" value="MONTSERRAT">MONTSERRAT</option>
                        <option data-type="country" value="MOROCCO">MOROCCO</option>
                        <option data-type="country" value="MOZAMBIQUE">MOZAMBIQUE</option>
                        <option data-type="country" value="MYANMAR">MYANMAR</option>
                        <option data-type="country" value="NAMBIA">NAMBIA</option>
                        <option data-type="country" value="NAURU">NAURU</option>
                        <option data-type="country" value="NEPAL">NEPAL</option>
                        <option data-type="country" value="NETHERLANDS">NETHERLANDS</option>
                        <option data-type="country" value="NETHERLANDS ANTILLES">NETHERLANDS ANTILLES</option>
                        <option data-type="country" value="NEW CALEDONIA">NEW CALEDONIA</option>
                        <option data-type="country" value="NEW ZEALAND">NEW ZEALAND</option>
                        <option data-type="country" value="NICARAGUA">NICARAGUA</option>
                        <option data-type="country" value="NIGER">NIGER</option>
                        <option data-type="country" value="NIGERIA">NIGERIA</option>
                        <option data-type="country" value="NIUE">NIUE</option>
                        <option data-type="country" value="NORFOLK ISLAND">NORFOLK ISLAND</option>
                        <option data-type="country" value="NORTHERN MARIANA ISLANDS">NORTHERN MARIANA ISLANDS</option>
                        <option data-type="country" value="NORWAY">NORWAY</option>
                        <option data-type="country" value="OMAN">OMAN</option>
                        <option data-type="country" value="PAKISTAN">PAKISTAN</option>
                        <option data-type="country" value="PALAU">PALAU</option>
                        <option data-type="country" value="PALESTINIAN TERRITORY, OCCUPIED">PALESTINIAN TERRITORY,
                          OCCUPIED
                        </option>
                        <option data-type="country" value="PANAMA">PANAMA</option>
                        <option data-type="country" value="PAPUA NEW GUINEA">PAPUA NEW GUINEA</option>
                        <option data-type="country" value="PARAGUAY">PARAGUAY</option>
                        <option data-type="country" value="PERU">PERU</option>
                        <option data-type="country" value="PHILIPPINES">PHILIPPINES</option>
                        <option data-type="country" value="PHILLIPINES">PHILLIPINES</option>
                        <option data-type="country" value="PITCAIRN">PITCAIRN</option>
                        <option data-type="country" value="POLAND">POLAND</option>
                        <option data-type="country" value="PORTUGAL">PORTUGAL</option>
                        <option data-type="country" value="PUERTO RICO">PUERTO RICO</option>
                        <option data-type="country" value="QATAR">QATAR</option>
                        <option data-type="country" value="REUNION">REUNION</option>
                        <option data-type="country" value="ROMANIA">ROMANIA</option>
                        <option data-type="country" value="RUSSIAN FEDERATION">RUSSIAN FEDERATION</option>
                        <option data-type="country" value="RWANDA">RWANDA</option>
                        <option data-type="country" value="SAINT HELENA">SAINT HELENA</option>
                        <option data-type="country" value="SAINT KITTS AND NEVIS">SAINT KITTS AND NEVIS</option>
                        <option data-type="country" value="SAINT LUCIA">SAINT LUCIA</option>
                        <option data-type="country" value="SAINT PIERRE AND MIQUELON">SAINT PIERRE AND MIQUELON</option>
                        <option data-type="country" value="SAINT VINCENT AND THE GRENADINES">SAINT VINCENT AND THE
                          GRENADINES</option>
                        <option data-type="country" value="SAMOA">SAMOA</option>
                        <option data-type="country" value="SAN MARINO">SAN MARINO</option>
                        <option data-type="country" value="SAO TOME AND PRINCIPE">SAO TOME AND PRINCIPE</option>
                        <option data-type="country" value="SARK, C.I.">SARK, C.I.</option>
                        <option data-type="country" value="SAUDI ARABIA">SAUDI ARABIA</option>
                        <option data-type="country" value="SENEGAL">SENEGAL</option>
                        <option data-type="country" value="SERBIA">SERBIA</option>
                        <option data-type="country" value="SEYCHELLES">SEYCHELLES</option>
                        <option data-type="country" value="SIERRA LEONE">SIERRA LEONE</option>
                        <option data-type="country" value="SLOVAKIA">SLOVAKIA</option>
                        <option data-type="country" value="SLOVENIA">SLOVENIA</option>
                        <option data-type="country" value="SOLOMON ISLANDS">SOLOMON ISLANDS</option>
                        <option data-type="country" value="SOMALIA">SOMALIA</option>
                        <option data-type="country" value="SOUTH AFRICA">SOUTH AFRICA</option>
                        <option data-type="country" value="SOUTH GEORGIA AND THE SANDWICH ISLANDS">SOUTH GEORGIA AND THE
                          SANDWICH ISLANDS</option>
                        <option data-type="country" value="SPAIN">SPAIN</option>
                        <option data-type="country" value="SRI LANKA">SRI LANKA</option>
                        <option data-type="country" value="SUDAN">SUDAN</option>
                        <option data-type="country" value="SURINAME">SURINAME</option>
                        <option data-type="country" value="SVALBARD AND JAN MAYEN">SVALBARD AND JAN MAYEN</option>
                        <option data-type="country" value="SWEDEN">SWEDEN</option>
                        <option data-type="country" value="SWITZERLAND">SWITZERLAND</option>
                        <option data-type="country" value="SYRIAN, ARAB REPUBLIC">SYRIAN, ARAB REPUBLIC</option>
                        <option data-type="country" value="TAIWAN, REPUBLIC OF CHINA">TAIWAN, REPUBLIC OF CHINA</option>
                        <option data-type="country" value="TAJIKSTAN">TAJIKSTAN</option>
                        <option data-type="country" value="TANZANIA, UNITED REPUBLIC OF">TANZANIA, UNITED REPUBLIC OF
                        </option>
                        <option data-type="country" value="THAILAND">THAILAND</option>
                        <option data-type="country" value="TOGO">TOGO</option>
                        <option data-type="country" value="TOKELAU">TOKELAU</option>
                        <option data-type="country" value="TONGA">TONGA</option>
                        <option data-type="country" value="TRINIDAD AND TOBAGO">TRINIDAD AND TOBAGO</option>
                        <option data-type="country" value="TUNISIA">TUNISIA</option>
                        <option data-type="country" value="TURKIYE">TURKIYE</option>
                        <option data-type="country" value="TURKMENISTAN">TURKMENISTAN</option>
                        <option data-type="country" value="TURKS AND CAICOS ISLANDS">TURKS AND CAICOS ISLANDS</option>
                        <option data-type="country" value="TUVALU">TUVALU</option>
                        <option data-type="country" value="UGANDA">UGANDA</option>
                        <option data-type="country" value="UKRAINE">UKRAINE</option>
                        <option data-type="country" value="UNITED ARAB EMIRATES">UNITED ARAB EMIRATES</option>
                        <option data-type="country" value="UNITED STATES MINOR OUTLYING">UNITED STATES MINOR OUTLYING
                        </option>
                        <option data-type="country" value="URUGUAY">URUGUAY</option>
                        <option data-type="country" value="UZBEKISTAN">UZBEKISTAN</option>
                        <option data-type="country" value="VANUATU">VANUATU</option>
                        <option data-type="country" value="VENEZUELA">VENEZUELA</option>
                        <option data-type="country" value="VIET NAM">VIET NAM</option>
                        <option data-type="country" value="VIRGIN ISLANDS, BRITISH">VIRGIN ISLANDS, BRITISH</option>
                        <option data-type="country" value="VIRGIN ISLANDS, US">VIRGIN ISLANDS, US</option>
                        <option data-type="country" value="WALLIS AND FUTUNA">WALLIS AND FUTUNA</option>
                        <option data-type="country" value="WESTERN SAHARA">WESTERN SAHARA</option>
                        <option data-type="country" value="YEMEN">YEMEN</option>
                        <option data-type="country" value="YUGOSLOVIA">YUGOSLOVIA</option>
                        <option data-type="country" value="ZAMBIA">ZAMBIA</option>
                        <option data-type="country" value="ZIMBABWE">ZIMBABWE</option>

                      </select>
                    </div>
                  </div>
                  <div class="mc-field-group-wrapper display-flex flex-col-mobile state-form-field always-hide">
                    <div class="mc-field-group custom-col-6-md padding-10 form-first-select-mobile">
                      <select id="fe14977" name="stateProv" class="u-full-width form__select">
                        <option value="" selected="selected">State<span>*</span></option>
                        <option data-type="state" data-filter="united states" value="ALABAMA">ALABAMA</option>
                        <option data-type="state" data-filter="united states" value="ALASKA">ALASKA</option>
                        <option data-type="state" data-filter="united states" value="ARIZONA">ARIZONA</option>
                        <option data-type="state" data-filter="united states" value="ARKANSAS">ARKANSAS</option>
                        <option data-type="state" data-filter="united states" value="CALIFORNIA">CALIFORNIA</option>
                        <option data-type="state" data-filter="united states" value="CANAL ZONE">CANAL ZONE</option>
                        <option data-type="state" data-filter="united states" value="COLORADO">COLORADO</option>
                        <option data-type="state" data-filter="united states" value="CONNECTICUT">CONNECTICUT</option>
                        <option data-type="state" data-filter="united states" value="DELAWARE">DELAWARE</option>
                        <option data-type="state" data-filter="united states" value="DISTRICT OF COLUMBIA">DISTRICT OF
                          COLUMBIA
                        </option>
                        <option data-type="state" data-filter="united states" value="FLORIDA">FLORIDA</option>
                        <option data-type="state" data-filter="united states" value="GEORGIA">GEORGIA</option>
                        <option data-type="state" data-filter="united states" value="HAWAII">HAWAII</option>
                        <option data-type="state" data-filter="united states" value="IDAHO">IDAHO</option>
                        <option data-type="state" data-filter="united states" value="ILLINOIS">ILLINOIS</option>
                        <option data-type="state" data-filter="united states" value="INDIANA">INDIANA</option>
                        <option data-type="state" data-filter="united states" value="IOWA">IOWA</option>
                        <option data-type="state" data-filter="united states" value="KANSAS">KANSAS</option>
                        <option data-type="state" data-filter="united states" value="KENTUCKY">KENTUCKY</option>
                        <option data-type="state" data-filter="united states" value="LOUISIANA">LOUISIANA</option>
                        <option data-type="state" data-filter="united states" value="MAINE">MAINE</option>
                        <option data-type="state" data-filter="united states" value="MARYLAND">MARYLAND</option>
                        <option data-type="state" data-filter="united states" value="MASSACHUSETTS">MASSACHUSETTS
                        </option>
                        <option data-type="state" data-filter="united states" value="MICHIGAN">MICHIGAN</option>
                        <option data-type="state" data-filter="united states" value="MILITARY APO">MILITARY APO</option>
                        <option data-type="state" data-filter="united states" value="MINNESOTA">MINNESOTA</option>
                        <option data-type="state" data-filter="united states" value="MISSISSIPPI">MISSISSIPPI</option>
                        <option data-type="state" data-filter="united states" value="MISSOURI">MISSOURI</option>
                        <option data-type="state" data-filter="united states" value="MONTANA">MONTANA</option>
                        <option data-type="state" data-filter="united states" value="NEBRASKA">NEBRASKA</option>
                        <option data-type="state" data-filter="united states" value="NEVADA">NEVADA</option>
                        <option data-type="state" data-filter="united states" value="NEW HAMPSHIRE">NEW HAMPSHIRE
                        </option>
                        <option data-type="state" data-filter="united states" value="NEW JERSEY">NEW JERSEY</option>
                        <option data-type="state" data-filter="united states" value="NEW MEXICO">NEW MEXICO</option>
                        <option data-type="state" data-filter="united states" value="NEW YORK">NEW YORK</option>
                        <option data-type="state" data-filter="united states" value="NORTH CAROLINA">NORTH CAROLINA
                        </option>
                        <option data-type="state" data-filter="united states" value="NORTH DAKOTA">NORTH DAKOTA</option>
                        <option data-type="state" data-filter="united states" value="OHIO">OHIO</option>
                        <option data-type="state" data-filter="united states" value="OKLAHOMA">OKLAHOMA</option>
                        <option data-type="state" data-filter="united states" value="OREGON">OREGON</option>
                        <option data-type="state" data-filter="united states" value="PENNSYLVANIA">PENNSYLVANIA</option>
                        <option data-type="state" data-filter="united states" value="RHODE ISLAND">RHODE ISLAND</option>
                        <option data-type="state" data-filter="united states" value="SOUTH CAROLINA">SOUTH CAROLINA
                        </option>
                        <option data-type="state" data-filter="united states" value="SOUTH DAKOTA">SOUTH DAKOTA</option>
                        <option data-type="state" data-filter="united states" value="TENNESSEE">TENNESSEE</option>
                        <option data-type="state" data-filter="united states" value="TEXAS">TEXAS</option>
                        <option data-type="state" data-filter="united states" value="UTAH">UTAH</option>
                        <option data-type="state" data-filter="united states" value="VERMONT">VERMONT</option>
                        <option data-type="state" data-filter="united states" value="VIRGINIA">VIRGINIA</option>
                        <option data-type="state" data-filter="united states" value="WASHINGTON">WASHINGTON</option>
                        <option data-type="state" data-filter="united states" value="WEST VIRGINIA">WEST VIRGINIA
                        </option>
                        <option data-type="state" data-filter="united states" value="WISCONSIN">WISCONSIN</option>
                        <option data-type="state" data-filter="united states" value="WYOMING">WYOMING</option>
                        <option data-type="state" data-filter="canada" VALUE="ALBERTA">ALBERTA</option>
                        <option data-type="state" data-filter="canada" VALUE="BRITISH COLUMBIA">BRITISH COLUMBIA
                        </option>
                        <option data-type="state" data-filter="canada" VALUE="MANITOBA">MANITOBA</option>
                        <option data-type="state" data-filter="canada" VALUE="NEW BRUNSWICK">NEW BRUNSWICK</option>
                        <option data-type="state" data-filter="canada" VALUE="NEWFOUNDLAND AND LABRADOR">NEWFOUNDLAND
                          AND
                          LABRADOR</option>
                        <option data-type="state" data-filter="canada" VALUE="NORTHWEST TERRITORIES">NORTHWEST
                          TERRITORIES
                        </option>
                        <option data-type="state" data-filter="canada" VALUE="NOVA SCOTIA">NOVA SCOTIA</option>
                        <option data-type="state" data-filter="canada" VALUE="NUNAVUT">NUNAVUT</option>
                        <option data-type="state" data-filter="canada" VALUE="ONTARIO">ONTARIO</option>
                        <option data-type="state" data-filter="canada" VALUE="PRINCE EDWARD ISLAND">PRINCE EDWARD ISLAND
                        </option>
                        <option data-type="state" data-filter="canada" VALUE="QUEBEC">QUEBEC</option>
                        <option data-type="state" data-filter="canada" VALUE="SASKATCHEWAN">SASKATCHEWAN</option>
                        <option data-type="state" data-filter="canada" VALUE="YUKON">YUKON</option>
                      </select>
                    </div>

                  </div>

                  <div class="legal">
                    <input id="field100" name="DJ_OptIn_Checkbox" type="checkbox" value="Dow Jones Opt-in"
                      style="display:inline; margin:0 1rem;">
                    <p>
                    I would like to receive updates and special offers from Dow Jones and affiliates, including
                    recommended
                    content or information on upcoming events. I can unsubscribe at any time.
                    <br><br>
                    By clicking the button
                    below, you
                    agree to the Dow Jones <a href="https://www.dowjones.com/privacy-notice/"
                      target="_blank">Privacy
                      Notice</a>
                    and <a href="https://www.dowjones.com/cookie-notice/"
                      target="_blank">Cookie
                      Notice</a>.
                    </p>
                  </div>

                  <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                  </div>

                  <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_4f9355a5e064e027a3654a3e6_636ad25f2e" tabindex="-1" value="">
                  </div>

                  <input type="hidden" name="webformnamehiddenField" id="fe12864" value="<?php echo $form_id ?>">

                  <input type="hidden" name="formId" id="fe12865"
                    value="https://s716031822.t.eloqua.com/e/f2?elqFormName=<?php echo $form_id;?>&elqSiteID=716031822">

                  <!--eof Product of Interest input to change-->
                  <input type="hidden" name="RedirectValuehiddenField" id="fe12865" value="">
                  <input type="hidden" id="fe12866" value="<?php echo $select_outcome; ?>">
                  <input type="hidden" id="fe12867" value="<?php echo $redirect_url; ?>">
                  <input type="hidden" id="fe12868" value="<?php echo $form_type; ?>">
                  <input type="hidden" id="fe12869" value="<?php echo $document; ?>">

                  <div class="center-text">

                    <button id="form-submit" type="submit" name="submit" class="btn btn--primary form-submit" onclick="fetchform()">
                      <?php echo $cta ;?>
                    </button>
                    <button class="btn btn--primary form-submit-loading hidden">
                      <div class="load-wrapp">
                        <div class="load-3">
                          <div class="line"></div>
                          <div class="line"></div>
                          <div class="line"></div>
                        </div>
                      </div>
                    </button>
                    <!-- <div class="clear">
                            <input id="subscribe" type="submit" value="Sign Up" name="subscribe" class="button btn">
                        </div> -->

                    <p class="reg-errors"><span>*</span>Field Required</p>
                  </div>
                </div>
              </div>


            </div>
          </article>
        </section>
      </div>

    </div>
  </section>

</section>