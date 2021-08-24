-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 08:10 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travellopia`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `package_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_journey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `package_id`, `email`, `date_of_journey`, `price`, `status`) VALUES
('itibera5@gmail.com1628528079', 'Visit the Land of Aryans in Ladakh1628177004', 'itibera5@gmail.com', 'Aug 27, 2021', '92100', 'upcoming'),
('itibera5@gmail.com1629375757', '7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'itibera5@gmail.com', 'Sep 15, 2021', '53100', 'upcoming'),
('manna.amit99@gmail.com1628422732', 'Visit the Land of Aryans in Ladakh1628177004', 'manna.amit99@gmail.com', 'Aug 27, 2021', '92100', 'upcoming'),
('manna.amit99@gmail.com1628422977', 'Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'manna.amit99@gmail.com', 'Sep 12, 2021', '56100', 'upcoming'),
('manna.amit99@gmail.com1628423024', '7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'manna.amit99@gmail.com', 'Sep 15, 2021', '53100', 'upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `booking_persons`
--

CREATE TABLE `booking_persons` (
  `booking_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `person_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `travel_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_persons`
--

INSERT INTO `booking_persons` (`booking_id`, `person_name`, `age`, `gender`, `travel_date`) VALUES
('itibera5@gmail.com1628528079', 'Iti Bera', '24', 'Female', 'Aug 27, 2021'),
('itibera5@gmail.com1628528079', 'Lipi Bera', '20', 'Female', 'Aug 27, 2021'),
('itibera5@gmail.com1629375757', 'Amit Manna', '23', 'Female', 'Sep 15, 2021'),
('itibera5@gmail.com1629375757', 'Iti Bera', '24', 'Female', 'Sep 15, 2021'),
('manna.amit99@gmail.com1628422732', 'Amit Manna', '23', 'Male', 'Aug 27, 2021'),
('manna.amit99@gmail.com1628422732', 'Iti Bera', '24', 'Female', 'Aug 27, 2021'),
('manna.amit99@gmail.com1628422977', 'Kishor Manna', '56', 'Male', 'Sep 12, 2021'),
('manna.amit99@gmail.com1628422977', 'Rina Manna', '49', 'Female', 'Sep 12, 2021'),
('manna.amit99@gmail.com1628423024', 'Chiradip Karati', '35', 'Male', 'Sep 15, 2021'),
('manna.amit99@gmail.com1628423024', 'Piyali Karati', '33', 'Female', 'Sep 15, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `name`, `location`, `description`, `photo`, `link`) VALUES
('Ayur Green Resort and Spa-Munnar1628226769', 'Ayur Green Resort and Spa', 'Munnar', 'When the earth reaches out with its rolling hills to hold onto the rain clouds, the monsoons are born. With that, life is awakened from the earth. It sprouts forth green, so vivid, so vibrant, to connect with our souls and nourish our lives further. Wake up to singing birds and rustling leaves. Open your windows to see the early morning light bounce off the dew resting on the leaves. Revitalize your lungs as it breathes in the aroma filled air of the earth and trees. Away from the city hustle bustle life,come and enjoy the nature, Near ones, Thinking what to do in weekend ?? come to resort relax, enjoy in pool and weather.', '0d3d5b206b8111e795d20a4cef95d023.webp', 'https://www.makemytrip.com/hotels/ayur_green_resort_and_spa-details-munnar.html'),
('Clarion Inn Sevilla-Zirakpur, Chandigarh1628082400', 'Clarion Inn Sevilla', 'Zirakpur, Chandigarh', 'Location: A part of Choice Hotels International, Hotel Clarion Inn Sevilla Chandigarh enjoys a quiet location on Zirakpur-Panchkula-Kalka Highway. A short walk from Gurudwara Shri Baoli Sahib (800 m), this 4 star hotel is less than 2 km from Big Bazaar and 8 km from Elante Mall. Rock Garden is about 30 minutes drive away (16 km). Further, Chandigarh Railway Station is within 6 km whereas Chandigarh Airport is 9 km away. Room Amenities: The hotel\'s 106 soundproof rooms and suites are tastefully appointed and offer modern amenities like air conditioning, LCD TV, mini bar, tea/coffee maker, electronic safe, iron/ironing board, work desk, Wi-Fi and 24-hour room service. Bedside console allows guests to easily control AC temperature setting, television and room lights. Deluxe Rooms have bedside tables and offers views of the city. Bathrooms feature eco-friendly toiletries and hairdryers (on request). Hotel Facilities: Keeping in view fitness and wellness needs of guests, the hotel maintains a fully equipped gymnasium and a spa with thermal rooms. It also has a modern business centre and conference room to cater to its business clientele. Other hotel facilities include 24-hour concierge services, airport transfers, indoor/outdoor parking, babysitting and same-day laundry. Dining: Good Life, the hotel\'s all-day dining restaurant-cum-bar, serves a lavish buffet-style breakfast, lunch and dinner. Here, guests can enjoy international dishes, snacks, and a variety of non-alcoholic drinks and cocktails. In the evenings, they can unwind with wines and spirits at High\' Bury-Bar while enjoying soothing lounge music.', 'cover-picture.jpg', 'https://www.makemytrip.com/hotels/clarion_inn_sevilla-details-zirakpur.html'),
('Desert Himalaya Resort-Diskit1628169856', 'Desert Himalaya Resort', 'Diskit', 'Location: Desert Himalaya Resort is nestled in Nubra Valley which is a place of beauteous scenery, with the lush green valley. Desert Himalaya Resort is an economic property which delivers refreshingly uncomplicated quality stay with a sparkle of simplicity. For easy access, guests can arrive at the hotel by nearest transportation facility available at Leh Kushok Bakula Rimpochee Airport and Leh Railway Station.\r\n\r\nRoom Amenities: The rooms in the hotel are well-maintained, ventilated, clean and come with good quality furniture. The hotel houses simple and sober rooms that offer a homely ambiance to guests. All rooms have attached bathroom with essential bathroom toiletries.\r\n\r\nHotel Facilities: An array of all essential services are rendered by the hotel for a hassle free stay that includes room service and many other services. Guests can avail rejuvenating massage therapies and treatments at the in-house spa. Holidaymakers can avail the service of travel desk in planning a suitable itinerary as per their budget and needs. In case of medical emergency doctor on call facility is also provided by the property.\r\n\r\nDining: Desert Himalaya offers a unique dining experience by offering a variety of vegetarian Indian, Chinese and Continental meals, served piping hot in the spacious and well equipped dining hall.', 'a3893f0ccf7511eb89e50242ac110003.webp', 'https://www.makemytrip.com/hotels/desert_himalaya_resort-details-nubra_valley.html'),
('Fort Abode-Fort Kochi1628226642', 'Fort Abode', 'Fort Kochi', 'Fort Abode provides swimming pool, massage centre and business centre with Wi-Fi facility. It is easily accessible from shopping complexes and malls as well.\r\n\r\nAt hotel, the guests find parking facility, taxi service and sightseeing facility with well-acquainted guides. Rooms are backed by kitchenette, iron & ironing board and, tea/coffee maker. Balcony/sit out, mini bar and daily newspaper are also offered.\r\n\r\nIt is located at a distance of 36.9 km from Cochin International Airport, 12.4 km from Ernakulam Junction South and 26.4 km from Aluva KSRTC Bus Terminal.\r\n\r\nThe property is located close to Kashi Art Gallery, Wonderla Amusment park, Kerela Kathakali centre, Folklore Museum and many more.\r\n\r\nA perfect place for leisure traveller.', '0d3d5b206b8111e795d20a4cef95d023.webp', 'https://www.makemytrip.com/hotels/fort_abode-details-cochin.html'),
('Hotel Flora-Shivalik Nagar1628229268', 'Hotel Flora', 'Shivalik Nagar', 'Location: Nestled in the city famous for its temples and ghats, Hotel Flora is one of the finest property in Haridwar. The nearest airport is the Jolly Grant Airport and the closest rail-head is the Haridwar Railway Station. Famous places to visit in the city are Maya Devi Temple (11 km), Vishnu Ghat (12 km), Har Ki Pauri (13 km), Mansa Devi Temple (13 km), Chandi Devi Temple (14 km) and many more. Room Amenities: All the rooms are elegantly appointed and well equipped with modern amenities like air conditioner, television and many more. Each room has attached bathroom with regular supply of hot and cold water. Hotel Facilities: An array of all essential services are rendered by the hotel which includes laundry services, round the clock power supply, travel desk to make tour arrangements, parking facility, pickup and drop facility and room service. The doctor on call facility ensures health safety of patrons. Dining: The restaurant at the hotel offers a wholesome dining experience with a variety of delicacies for guests, who wish to pamper their taste buds. The food served here considers the specialty of the dishes while making sure about the hygienic standard and service is prompt and friendly.\r\n\r\nPlease note-\r\n\r\n01. Local id (Person) Not Allowed\r\n\r\n02. Unmarried Couples Not Allowed', '201412081026169584-445769f852ba11e99ea60242ac110003.jpg', 'https://www.makemytrip.com/hotels/hotel_flora-details-haridwar.html'),
('Hotel Sandra Palace-Kumily1628226949', 'Hotel Sandra Palace', 'Kumily', 'Sandra Palace is a standard accommodation facility in Thekkady that is located opposite Lourde Church. Mangala Devi Temple, a revered shrine in Thekkady, is reachable within a 30-minute drive of the hotel. All rooms of the property are fully furnished and well decorated. These are divided into different categories, namely Deluxe, Superior and Luxury. In all, there are 20 rooms, each of which is provided with attached bathroom The property offers two well decorated restaurants, namely Orchid and Green Apple. These restaurants serve an array of Indian, Chinese, Continental, Arabic and French delicacies. Besides warm hospitality, the hotel offers a range of conveniences to guests that include Wi-Fi, car parking and doctor-on-call. The housekeeping staff ensures that hotel premises, rooms and bathrooms are timely cleaned. While staying here, guests can plan a trip to Periyar National Park, which is just a 40-minute drive from the property.', '200908131444563702-34d042bcb8f411e8bcc60a031d5619c0.jpg', 'https://www.makemytrip.com/hotels/hotel_sandra_palace-details-thekkady.html'),
('Hotel Zojila Residency-Kargil1628169701', 'Hotel Zojila Residency', 'Kargil', 'Nestled in the serene ambience of Kargil, Hotel Zojila Residency is a luxury property in Kargil (Ladakh). It is located 212 km from Srinagar Airport and 241 km from Srinagar Railway Station.\r\n\r\nFor accommodation, the property offers spacious, airy and well-lit rooms, featuring luxurious decor and furnishings. They come with in room amenities like satellite television, telephone, work desk and an attached bathroom with hot/cold running water and essential toiletries. Ample conveniences are offered at the hotel to suffice the varying requirements of guests. These includes doctor on call, laundry, parking, wake up facility, car rental and internet facility (on chargeable bases). The supportive staff of the hotel ensures that all needs of guests are timely fulfilled.\r\n\r\nThe multi-cuisine restaurant serves choicest dishes from around the world to cater to the varied taste of travellers. Those on business tour can host meetings, conferences and seminars as it features well-equipped conferencing facilities making it a perfect base for business travellers.\r\n\r\nThis property is an ideal pick for spending a peaceful vacation, away from the city din!', 'cover-photo.webp', 'https://www.makemytrip.com/hotels/hotel_zojila_residency-details-kargil.html'),
('Ladakh Himalayan Retreat-Leh1628169483', 'Ladakh Himalayan Retreat', 'Leh', 'Nestled in a beautiful city of Leh, Ladakh Himalayan Retreat is a boutique property. The property lies in the heart of valley with some very unique fascinations like sand dunes at walking distance, shining crystal clear water of the glacial stream, cool summer breeze caused by the beautiful plantations, ruins of buildings, river banks covered with thorns and other plants. Very conviniently located the hotel is at a distance of just 3 km from the Leh Kushok Bakula Rimpochey Airport and JK SRTC Bus Stand is 2 km away. Hotel offers various facilities such as Wi-Fi access, laundry and dry cleaning service, round the clock room service, doctor on call, parking and travel desk. The retreat has a spacious lawn where guests can relax and have a cup of tea or coffee under the trees of apples and can enjoy the sound of different birds of Nubra Valley. For accommodation, the property offers spacious, airy and well-lit rooms, featuring simple decor and furnishings. The rooms are equipped with amenities such as satellite LCD television, Internet access, telephone, hot/cold water, attached bathroom and various other essential bathroom toiletries. Foodies are in for a gastronomic treat at the on-site restaurant, which severs mouth-watering vegetarian delicacies. Also a separate kitchen with dinning facility is available at the property. Adding to this is a pleasing ambience and never-ending conversations which will sum up to a memorable experience. Unwind and have a relaxed stay at Ladakh Himalayan Retreat!', 'cover-photo.jpg', 'https://www.makemytrip.com/hotels/ladakh_himalayan_retreat-details-leh.html'),
('Sagara Beach Resort-Kovalam1628227121', 'Sagara Beach Resort', 'Kovalam', '2.4 km from Kovalam Bus Stand, 400 m from Kovalam Beach, 14 km from Thiruvananthapuram Central Railway Station, 2 Swimming pools, Ayurvedic spa, Yoga centre, Rooftop multi-cuisine restaurant Sagara Beach Resort is a 3 star property, located in proximity to the famous Kovalam Beach. The hotel is within a walking distance from Kovalam Light House and the beach. There are 92 spacious and beautifully designed rooms that are spread in three blocks. Guests can make a choice of their accommodation from five available types- AC Standard Garden View, AC Deluxe, Palace Sea View, Suite and Honeymoon Suite. In-room conveniences include LCD TV, telephone and air-conditioner. Each room has a private balcony that overlooks the beautiful natural surroundings. Suitable for leisure travellers, the hotel offers a range of recreational facilities like Ayurvedic spa, two swimming pools, yoga and indoor/outdoor games. Other facilities offered are travel desk, safe deposit locker, laundry, parking, internet connectivity, babysitting and money exchange. For the entertainment of guests, the resort organises cultural programmes, upon request. Savour Indian, Chinese, Thai and Continental delicacies at the resort\'s rooftop restaurant. Do step in the rooftop restaurant to enjoy breathtaking views of the Light House and the Arabian Sea.', '113b8124290a11e899590224510f5e5b.webp', 'https://www.makemytrip.com/hotels/sagara_beach_resort-details-kovalam_and_poovar.html'),
('Snow Valley Resorts-Shimla1628081025', 'Snow Valley Resorts', 'Shimla', 'Location: Snow Valley Resorts is nestled in Shimla which is a perfect tourist destination in the country. Snow Valley Resorts is a standard accommodation offers a fine blend of opulence and comfort at its best. The property is at a distance of 18 km from Shimla Airport and the nearest railway station to the property is Kalka Railway Station.\r\n\r\nRoom Amenities: The rooms are modern and elegant in style and brightly lit. The staff ensures that all the rooms are clean, comfortable and sumptuous. The rooms are equipped with air conditioner, television and all modern amenities which ensures that guests have a relaxing stay at the hotel. All the rooms have attached bathrooms with basic toiletries and hot and cold running water.\r\n\r\nHotel Facilities: For a relaxed and comfortable stay, an array of facilities are offered such as elevator, front desk, laundry, taxi service and many more. It has a backup generator within the property in case of power failure. Well-trained staff is appointed at the hotel that ensures a comfortable stay for everyone.\r\n\r\nThere is a 24-hour front desk at the property. Guests can enjoy table tennis,air Hockey chess ,carrom board at the hotel\r\n\r\nDining: Guests can indulge their taste-buds to the delicious food temptations served at the multi cuisine restaurant.', 'cover-picture.webp', 'https://www.google.com/aclk?sa=l&ai=CTDMJCH4KYb-1D8zArQGpnr2wC_zJ05RhzfmtqP4N_K2IyJIoCAoQAigEYOUCoAHV-vXgAqkC2o6pu7LzTD6oAwWqBC5P0HLvk5L74KdfnQYw6W_0e6X9T1rleUCPl7Q4Hf8sIYqEkodR1qx0iBR6gZBCwATj5-Sy0wOIBfKby5cqwAWSAaAGZZAHA6gH8NkbyAmsAaIKmwEKCjIwMjEtMDgtMDUQASmI3_LwcIAj9TIKbWFrZW15dHJpcDgCSAFSC2EyLV96WEZRMGY0XVwrK0VlXH8JRHIDSU5SggErCilTdGFuZGFyZCBSb29tKE5vIFZpZXcpIChDZW50cmFsbHkgSGVhdGVkKbABAbgBBMgBhtPcL-ABAugBAvABAfgBAaACAOACAOoCA0lOUvACAYoDAOgKAZALA9ALGrgMAdAVAYAXAQ&sig=AOD64_0rcOp0xT5OSiDzI68TniDwafdXsA&adurl=https://www.makemytrip.com/hotels/hotel-details/%3Fcity%3DCTSLV%26country%3DIN%26checkin%3D08052021%26checkout%3D08062021%26hotelId%3D201506011832595016%26roomStayQualifier%3D2e0e%26cmp%3Dgooglehoteldfinder_DH_IN_localuniversal_201506011832595016_11323756018%26totalGuestCount%3D2%26roomCount%3D1%26type%3DCTY%26_uCurrency%3DINR%26Campaign%3D11323756018%26locusType%3Dcity%26locusId%3DCTSLV%26mtkeys%3DM0CeiK3g.skX-1WV-BL'),
('Sun N Snow Mussoorie-Near Mall Road1628229809', 'Sun N Snow Mussoorie', 'Near Mall Road', 'Location: Situated amidst lush green surroundings in a little piece of heaven on earth, Sun N Snow is the right choice for the visitors who are searching for a combination of charm, peace and convenient position in Mussoorie. The nearest airport is the Jolly Grant Airport and the closest railway station is the Dehradun Railway Station. Room Amenities: All the rooms are well appointed and are replete with conveniences like television, telephone and coffee table for a relaxing stay. The en suite washrooms have essential bath amenities and regular supply of hot and cold water. Hotel Facilities: Hotel features an array of modern conveniences like Wi-Fi access, parking facility, laundry services, room service, travel desk to make tour arrangements and doctor on call facility can be availed at the time of medical emergencies. It also has spacious on-site multi-purpose hall where guests can organize business or social events. Dining: Guests can savor authentic tehri garhwal dishes at the on-site restaurant that also serves delicious South Indian, Italian and Chinese dishes.', '932487ac7d7911e98ec60242ac110004.webp', 'https://www.makemytrip.com/hotels/sun_n_snow_mussoorie-details-mussoorie.html'),
('Swiss Cottage-Nainital1628230088', 'Swiss Cottage', 'Nainital', 'A combination of an old world charm equipped with all the luxuries needed on a holiday, The Swiss Cottage introduces the discerning traveller to the ultimate beauty, wilderness and quiet of the Himalayas. Its time to get off the unenthusiastic beaten track of been there done that locations and take the much needed break at this heritageHotel in Nainital. Fancy your morning breakfast in a quaint little English tea room. You will not be disappointed here. Swiss Hotel has heritage British architecture with bay windows (welcoming plenty of sunlight every morning), fire places and wood work. Whats better than basking in the sun on an October morning. Absolute bliss! While the mornings are peaceful and calm, you should step outside your room to witness what the evening has in store for you. Look up to the heavens to witness the canvas of the night dotted with thousands of stars.', '201511181607385594-f05093de81e911e993900242ac110003.jpg', 'https://www.makemytrip.com/hotels/swiss_cottage-details-nainital.html'),
('The Hideaway Bedzzz Rishikesh By Leisure Hotels-Rishikesh1628229666', 'The Hideaway Bedzzz Rishikesh By Leisure Hotels', 'Rishikesh', 'The Hideaway Bedzzz is Located in the Heart of Rishikesh, in the centre of the market & a short walk from Lakshman Jhula. This hotel showcases vibrant dcor and is bold & colourful, full of the vibe and buzz that the destination has to offer. The property offers a unique combination of well-priced Guest Rooms or Premium Bunk accommodation. With dedicated dorms for single ladiesor male travellers & back packersor rooms for couplesand friends. Designed & serviced to offer a smart stay experience with great value for money, it appeals to age groups of 15 to 55 years. With that in mind, youre in the best location to enjoy everything this colourful and exciting city has to offer. Accommodation & Facilities: Each room at The Hideaway Bedzzz is equipped with modern amenities. Your stay comes with smart, no-fuss dining services on offer, LCD TVs & hi-speed complimentary Wi-Fi. Take in the spiritual feel of Dev Bhumi on attached balconies to each type of accommodation. The hotel offers multiple areas for our guests to relax and spend their time. A bright lounge with large screen TV, seating counters and sink in sofas. Open sit out areas in the courtyard as well as a terrace offering great views of the Ganges & the city on either side. Our terrace offers uninhibited spaces for yoga & morning exercise. All guest floors are easily accessible with elevators and wide staircases. The hotel is designed with complete fire safety features and conversant with industry norms. Dinning: The Diner- The Self-Service Diner offers a daily buffet spread with both local and international flavours. Through the day guests can enjoy from a selection of light meals, snacks & hot/cold beverages from here. Travel Diaries Caf- Located on the 5th floor, open to a 240-degree aerial view of the surroundings, this outlet offers Indian, Mediterranean & Himalayan fare.', 'bd56e210cb1911eaa6ad0242ac110003.jpeg', 'https://www.makemytrip.com/hotels/the_hideaway_bedzzz_rishikesh_by_leisure_hotels-details-rishikesh.html'),
('The Holiday Resorts, Cottages & Spa-Simsa, Manali1628081757', 'The Holiday Resorts, Cottages & Spa', 'Simsa, Manali', 'Enjoy Himalayan views at the Holiday Resorts. Luxury cottages, adventure sports and global cuisines are the highlights. Location: Situated on the Kanyal Simsa Road, The Holiday Resorts, Cottages & Spa is 3.5 km from the Tibetan Monastery in the beautiful hilly destination of Manali. With the Kullu Manali Airport, about 49 km from the property, the Jogindernagar Railway Station (162 km) is the next nearest landmark for transportation to other cities and towns. While staying at the resort, guests can explore the Hadimba Devi Temple which is 5.9 km, Mall Road is 3.8 km and the Rohtang Pass is 54.6 km from the resort. Room Amenities: With a gorgeous view of the valley and mountains and excellent amenities for travelers, The Holiday Resorts, Cottages & Spa has well-furnished and spacious cottage-style living quarters. Every cottage has a kitchen and living area which is equipped with the necessary modern appliances. The 28 rooms on 3 floors are prepped with telephone, television facilities, a tea/coffee maker, a safe for expensive items, a working desk, basic toiletries, an attached bathroom and Wi-Fi access. Hotel Facilities: The Holiday Resorts, Cottages & Spa caters to the needs of vacationing tourists and business travelers. There is a well-equipped and stylish business center on the premises which provides Wi-Fi access. The resort offers room service, has parking facility for the guests, on-call emergency facility, and a helpful front desk. Guests can indulge in adventurous activities during their stay such as skiing, paragliding, adventure camps, mountain walks, and rappelling which can be organized by the resort. Guests can also shop at the property and unwind at the shared lounge. Dining: The Holiday Resorts, Cottages & Spa houses an exotic yet classy multi-cuisine restaurant which functions between 8 am and 10 pm. Guests can enjoy flavorsome delicacies from around the world for breakfast, lunch or dinner in a sophisticated ambiance.', 'cover-picture.jpg', 'https://www.google.com/url?q=https://www.google.com/aclk?sa%3Dl%26ai%3DCH6UhNo4KYY-eH6Ti1gG66oOQCfzJ05RhzfmtqP4NsqXwib8oCAoQASAAKARg5QKCARVkaXN0LWdvb2dsZS1tYXJrZXRpbmegAdX69eACqQLajqm7svNMPqgDBaoELk_QteXtNzpV0D_byuAxKH2IbjPZHujhoFHFQxJDJTpIb2rY7_G6rZfcpc2FarLABOPn5LLTA4gF8pvLlyrABZIBoAZliAcBkAcCqAfw2RvICawBogqsAQoKMjAyMS0wOC0wNBABKbDwdl-DfzyXMgptYWtlbXl0cmlwOAJIAVILczNmNmJiMk9sVUVdPaLERGUKF5BDcgNJTlKCATwKOlN0YW5kYXJkIFJvb20gd2l0aG91dCBiYWxjb255IG5vIHZpZXcgKE5vIHN0YWdzL0JhY2hlbG9ycymwAQG4AQDIAYbT3C_gAQDoAQHwAQH4AQCgAgDgAgDqAgNJTlLwAgGKAwDoCgGQCwPQCxy4DAHQFQGAFwE%26sig%3DAOD64_2wIyigokLGhQDteYx58-gVfDapfA%26adurl%3Dhttps://www.makemytrip.com/hotels/hotel-details/?city%253DCTKUU%2526country%253DIN%2526checkin%253D08042021%2526checkout%253D08052021%2526hotelId%253D200711051122373396%2526roomStayQualifier%253D2e0e%2526cmp%253Dgooglehoteldfinder_DH_IN_localuniversal_200711051122373396_11323756018%2526totalGuestCount%253D2%2526roomCount%253D1%2526type%253DCTY%2526_uCurrency%253DINR%2526Campaign%253D11323756018%2526locusType%253Dcity%2526locusId%253DCTKUU%2526mtkeys%253DM1C5PuXS.XBC-2oy-Kz'),
('The Madhushala Resort & Spa-Bail Parao, Uttarakhand1628229923', 'The Madhushala Resort & Spa', 'Bail Parao, Uttarakhand', 'Location: Nestled on the periphery of corbett landscape and surrounded two sides with rich sal forest, Bagheera Jungle Retreat makes a wonderful escape for those looking to stay close to nature. It is nestled in the midst of nature and adds to the beauty of the place. The nearest airport and railway station to the region are Dehra Dun Airport and Gaushala Railway Station.\r\n\r\nRoom Amenities: The resort offers cottages and rooms that are spacious and airy. The cottages are equipped with restful beds, sit out area and private bathroom. These cottages are perfectly suited to those looking to stay close to nature in peace and tranquility. The rooms are air conditioned and have attached washrooms with hot and cold water supply.\r\n\r\nHotel Facilities: The resort offers doctor on call, Wi-Fi, parking, power backup, business center, front desk, transport facility, indoor/outdoor games and many more. There is a kids play area, a place where little loved ones will be at top of thrill. One can take a plunge into clean and sparkling swimming pool at the resort. Guests can also enjoy jeep safaris, elephant safaris, bird watching tours, village visits and nature walks.\r\n\r\nDining: One can enjoy scrumptious meals with friends and family at in-house multi cuisine restaurant that specializes in lip smacking delicacies from around the world.', '14a701e60e6311e994f70242ac110005.jpg', 'https://www.makemytrip.com/hotels/the_madhushala_resort_spa-details-ramnagar.html'),
('Trium Resorts-Finishing Point1628227350', 'Trium Resorts', 'Finishing Point', 'Trium Resorts situated right at the heart of the hustle and bustle of Alleppey town proudly boasts of an amazing sojourn which offers spectacular hospitality to its guests. Contemporary accommodations, backwater conferencing facilities and a luxurious houseboat are a few of the sights of what we have to offer. A single glance at the hotel\'s lobby and reception will tell you that we do not merely talk, but also walk the talk. We at Trium Leisure offer an extensive variety of packages to choose from based upon your budget, duration, and other parameters of travel. The immaculate neighbourhood is idyllic for a comforting and invigorating holiday in Nature\'s bosom. You can also enjoy the famous Nehru Trophy boat race from our roof top. An added wonderful experience while in Alappuzha is a houseboat cruise. The modern houseboats are a reworked model of the \"Kettuvallams\" which were used to carry rice and spices from Kuttanad to Kochi Port. This architectural marvel is about 60 to 70 feet long and about 15 feet wide in the middle. The glittering water and the soothing, calm and cool breeze is an enticement that a houseboat can offer - an exclusive and exceptional experience that touches you with the vigour and vitality of the countryside of the God\'s Own Country. Our house boat is completely furnished and has rooms with A/c, comfortable chairs, dining area, kitchen and toilet. A fully fledged conference facility is a distinguished and outstanding feature of our houseboat.\" Ease out and have a delightful stay at Trium Resort!', '201605032152439708-9393def0513611e9bad30242ac110002.jpg', 'https://www.makemytrip.com/hotels/trium_resorts-details-alleppey.html');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `places` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pickup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dropoff` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `name`, `cover_photo`, `duration`, `places`, `pickup`, `dropoff`, `price`) VALUES
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', '7 Nights in Kerala Flight Inclusive Deal with Sightseeing', 'cover-photo.jpg', '7N/8D', 'Cochin, Munnar, Thekkady, Kovalam, Poovar, Allepey', 'Hyderabad', 'Kolkata', 26500),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'Uttarakhand - Rivers, Lakes and Corbett National Park', 'cover-photo.webp', '8N/9D', 'Haridwar, Rishikesh, Mussoorie, Corbett, Nainital', 'Kolkata', 'Kolkata', 28000),
('Visit the Land of Aryans in Ladakh1628177004', 'Visit the Land of Aryans in Ladakh', 'cover-photo.jpg', '7N/8D', 'Leh, Kargil, Nubra Valley', 'Kolkata', 'Kolkata', 46000);

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `package_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`package_id`, `date`) VALUES
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'Sep 15, 2021'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'Sep 12, 2021'),
('Visit the Land of Aryans in Ladakh1628177004', 'Aug 27, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tour_activity`
--

CREATE TABLE `tour_activity` (
  `package_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `day` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour_activity`
--

INSERT INTO `tour_activity` (`package_id`, `day`, `description`) VALUES
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 1, 'Arrival in Kochi via flight\r\nPrivate AC Sedan - AC for transfer from airport in Cochin to hotel in Munnar\r\nCheck-in to Hotel in Munnar'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 2, 'Breakfast at Hotel in Munnar\r\nPrivate AC Sedan - AC for sightseeing in & around Munnar'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 3, 'Breakfast at Hotel in Munnar\r\nCheckout from Hotel in Munnar\r\nPrivate AC Sedan - AC for transfer from Munnar to Thekkady\r\nCheck-in to Hotel in Thekkady'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 4, 'Breakfast at Hotel in Thekkady\r\nCheckout from Hotel in Thekkady\r\nPrivate AC Sedan - AC for transfer from Thekkady to Allepey\r\nCheck-in to Hotel in Allepey'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 5, 'Checkout from Hotel in Allepey\r\nPrivate AC Sedan - AC for transfer from Allepey to Kovalam and Poovar\r\nCheck-in to Hotel in Kovalam and Poovar'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 6, 'Breakfast at Hotel in Kovalam and Poovar\r\nPrivate AC Sedan - AC for sightseeing in & around Kovalam and Poovar'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 7, 'Breakfast at Hotel in Kovalam and Poovar\r\nCheckout from Hotel in Kovalam and Poovar\r\nPrivate AC Sedan - AC for transfer from Kovalam and Poovar to Cochin\r\nCheck-in to Hotel in Cochin'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 8, 'Checkout from Hotel in Cochin\r\nTransfer to airport via private AC Sedan - AC\r\nDeparture from Kochi via flight'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 1, 'Check in to Hotel Flora, 3 Star'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 2, 'Breakfast at Hotel in Haridwar\r\nCheckout from Hotel\r\nHaridwar to Rishikesh\r\nRishikesh - 1 Night Stay\r\nCheck in to The Hideaway Bedzzz Rishikesh By Leisure Hotels, 3 Star\r\nRafting : Brahampuri To Ram Jhula (Shortest - 8 Kms)'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 3, 'Breakfast at Hotel in Rishikesh\r\nCheckout from Hotel\r\nRishikesh to Mussoorie\r\nMussoorie - 2 Nights Stay\r\nCheck in to Sun N Snow Mussoorie, 3 Star'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 4, 'Breakfast at Hotel in Mussoorie\r\nPrivate Non AC Sedan - AC for sightseeing in & around Mussoorie\r\nPersonal Photoshoot in Mussoorie'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 5, 'Breakfast at Hotel in Mussoorie\r\nCheckout from Hotel\r\nMussoorie to Corbett\r\nCorbett - 2 Nights Stay\r\nCheck in to The Madhushala Resort & Spa, 3 Star'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 6, 'Breakfast at Hotel in Corbett\r\nPrivate Non AC Sedan - AC for sightseeing in & around Corbett'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 7, 'Breakfast at Hotel in Corbett\r\nCheckout from Hotel\r\nCorbett to Nainital\r\nNainital - 2 Nights Stay\r\nCheck in to Swiss Cottage, 3 Star'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 8, 'Private Non AC Sedan - AC for sightseeing in & around Nainital'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 9, 'Breakfast at Hotel in Nainital\r\nCheckout from Hotel'),
('Visit the Land of Aryans in Ladakh1628177004', 1, 'Arrival in Leh via flight\r\nTransfer to Hotel via private Non AC MUV (Standard) - Non AC\r\nCheck-in to Hotel in Leh\r\nTour Manager Assistance\r\nInnerline Permits and Environment Fee'),
('Visit the Land of Aryans in Ladakh1628177004', 2, 'Breakfast at Hotel in Leh\r\nCheckout from Hotel in Leh\r\nPrivate Non AC MUV (Standard) - Non AC for transfer from Leh to Kargil\r\nCheck-in to Hotel in Kargil'),
('Visit the Land of Aryans in Ladakh1628177004', 3, 'Breakfast at Hotel in Kargil\r\nCheckout from Hotel in Kargil\r\nPrivate Non AC MUV (Standard) - Non AC for transfer from Kargil to Leh\r\nCheck-in to Hotel in Leh'),
('Visit the Land of Aryans in Ladakh1628177004', 4, 'Breakfast at Hotel in Leh\r\nCheckout from Hotel in Leh\r\nPrivate Non AC MUV (Standard) - Non AC for transfer from Leh to Nubra Valley\r\nCheck-in to Hotel in Nubra Valley'),
('Visit the Land of Aryans in Ladakh1628177004', 5, 'Breakfast at Hotel in Nubra Valley\r\nCheckout from Hotel in Nubra Valley\r\nPrivate Non AC MUV (Standard) - Non AC for transfer from Nubra Valley to Leh\r\nCheck-in to Hotel in Leh'),
('Visit the Land of Aryans in Ladakh1628177004', 6, 'Breakfast at Hotel in Leh\r\nPrivate Non AC MUV (Standard) - Non AC for sightseeing in & around Leh'),
('Visit the Land of Aryans in Ladakh1628177004', 7, 'Breakfast at Hotel in Leh\r\nPrivate Non AC MUV (Standard) - Non AC for sightseeing in & around Leh'),
('Visit the Land of Aryans in Ladakh1628177004', 8, 'Breakfast at Hotel in Leh\r\nCheckout from Hotel in Leh\r\nTransfer to airport via private Non AC MUV (Standard) - Non AC\r\nDeparture from Leh via flight');

-- --------------------------------------------------------

--
-- Table structure for table `tour_hotels`
--

CREATE TABLE `tour_hotels` (
  `package_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour_hotels`
--

INSERT INTO `tour_hotels` (`package_id`, `hotel_id`) VALUES
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'Ayur Green Resort and Spa-Munnar1628226769'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'Fort Abode-Fort Kochi1628226642'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'Hotel Sandra Palace-Kumily1628226949'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'Sagara Beach Resort-Kovalam1628227121'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'Trium Resorts-Finishing Point1628227350'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'Hotel Flora-Shivalik Nagar1628229268'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'Sun N Snow Mussoorie-Near Mall Road1628229809'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'Swiss Cottage-Nainital1628230088'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'The Hideaway Bedzzz Rishikesh By Leisure Hotels-Rishikesh1628229666'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'The Madhushala Resort & Spa-Bail Parao, Uttarakhand1628229923'),
('Visit the Land of Aryans in Ladakh1628177004', 'Desert Himalaya Resort-Diskit1628169856'),
('Visit the Land of Aryans in Ladakh1628177004', 'Hotel Zojila Residency-Kargil1628169701'),
('Visit the Land of Aryans in Ladakh1628177004', 'Ladakh Himalayan Retreat-Leh1628169483');

-- --------------------------------------------------------

--
-- Table structure for table `tour_photos`
--

CREATE TABLE `tour_photos` (
  `package_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour_photos`
--

INSERT INTO `tour_photos` (`package_id`, `photo`) VALUES
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', '1_14382_02.jpg'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', '2478.jpg'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', '2488.webp'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', '2927.jpg'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'A Short Trip to Munnar and Allepey.jpg'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'backwater-allepey.webp'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'chef__guest_interaction.webp'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'coconut-palm-trees-at-backwaters.jpg'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'Large-Houseboat-of-Kerala.jpg'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'Munnar Trek.jpg'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'Thekkady.jpg'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'Thoovanam Waterfalls.webp'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'Vivanta-by-Taj-Kovalam1.jpg'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', '1044.webp'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', '2819.webp'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', '2827.webp'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', '984 (1).webp'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', '984.webp'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', '990.webp'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'Corbett4.jpg'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'Haridwar.webp'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'Nainital1_Karan-Vaid.webp'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'Rafting_Sumit-Mehta.jpg'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'Rishikesh_Tarika-Chopra.webp'),
('Visit the Land of Aryans in Ladakh1628177004', '1200x658_Leh_1_Vivek-Chauhan.webp'),
('Visit the Land of Aryans in Ladakh1628177004', '388.webp'),
('Visit the Land of Aryans in Ladakh1628177004', '394.webp'),
('Visit the Land of Aryans in Ladakh1628177004', '400.webp'),
('Visit the Land of Aryans in Ladakh1628177004', '410.jpg'),
('Visit the Land of Aryans in Ladakh1628177004', '412_2.jpeg'),
('Visit the Land of Aryans in Ladakh1628177004', '412_4.jpeg'),
('Visit the Land of Aryans in Ladakh1628177004', '412_5.jpeg'),
('Visit the Land of Aryans in Ladakh1628177004', '430.jpg'),
('Visit the Land of Aryans in Ladakh1628177004', '434.jpg'),
('Visit the Land of Aryans in Ladakh1628177004', 'Leh05.webp'),
('Visit the Land of Aryans in Ladakh1628177004', 'Nubra-valley.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tour_services`
--

CREATE TABLE `tour_services` (
  `package_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour_services`
--

INSERT INTO `tour_services` (`package_id`, `service`) VALUES
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'fas fa-bed'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'fas fa-car-side'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'fas fa-plane-departure'),
('7 Nights in Kerala Flight Inclusive Deal with Sightseeing1628227809', 'fas fa-utensils'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'fas fa-bed'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'fas fa-car-side'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'fas fa-glasses'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'fas fa-plane-departure'),
('Uttarakhand - Rivers, Lakes and Corbett National Park1628230481', 'fas fa-utensils'),
('Visit the Land of Aryans in Ladakh1628177004', 'fas fa-bed'),
('Visit the Land of Aryans in Ladakh1628177004', 'fas fa-car-side'),
('Visit the Land of Aryans in Ladakh1628177004', 'fas fa-plane-departure'),
('Visit the Land of Aryans in Ladakh1628177004', 'fas fa-utensils');

-- --------------------------------------------------------

--
-- Table structure for table `trending_packages`
--

CREATE TABLE `trending_packages` (
  `package_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `booking_persons`
--
ALTER TABLE `booking_persons`
  ADD PRIMARY KEY (`booking_id`,`person_name`,`travel_date`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`package_id`,`date`);

--
-- Indexes for table `tour_activity`
--
ALTER TABLE `tour_activity`
  ADD PRIMARY KEY (`package_id`,`day`);

--
-- Indexes for table `tour_hotels`
--
ALTER TABLE `tour_hotels`
  ADD PRIMARY KEY (`package_id`,`hotel_id`);

--
-- Indexes for table `tour_photos`
--
ALTER TABLE `tour_photos`
  ADD PRIMARY KEY (`package_id`,`photo`);

--
-- Indexes for table `tour_services`
--
ALTER TABLE `tour_services`
  ADD PRIMARY KEY (`package_id`,`service`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
