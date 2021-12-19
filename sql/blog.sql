-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2021 at 07:11 PM
-- Server version: 5.6.51
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cp444414_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `adsone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adstwo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adsthree` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adsfour` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adsfive` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adssix` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `adsone`, `adstwo`, `adsthree`, `adsfour`, `adsfive`, `adssix`, `ads_text`) VALUES
(2, '', '', '', '', '', '', 'google.com, pub-6083110028149432, DIRECT, f08c47fec0942fa0');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pimg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fimg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `simg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foimg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiimg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcontent` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `scontent` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tcontent` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `focontent` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ficontent` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sicontent` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `secontent` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(10) NOT NULL,
  `blog_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(13) NOT NULL,
  `created_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `pimg`, `fimg`, `simg`, `timg`, `foimg`, `fiimg`, `fcontent`, `scontent`, `tcontent`, `focontent`, `ficontent`, `sicontent`, `secontent`, `link`, `category`, `blog_id`, `views`, `created_date`, `modified_date`) VALUES
(53, 'In Myanmar, 11.85 million people received complete doses of the COVID-19 vaccine.', 'file-photo--volunteers-help-a-coronavirus-disease--covid-19--patient-with-extra-oxygen-in-the-town-of-kale--sagaing-region--myanmar-2.jpg', '', '', '', '', '', 'According to the Ministry of Health, a total of 11.85 million people in Myanmar have received two full doses of the COVID-19 vaccine as of November 30. (MOH).', 'Myanmar planned to treat 36.9 million people over the age of 18 with the COVID-19 vaccine. A total of 11,858,598 (11.85 million) people have been fully vaccinated, whereas 4,990,574 (4.9 million) people have been immunized once. According to the Ministry of Health, a total of 16,849,172 persons have gotten over 28 million vaccinations.', 'The COVID-19 vaccination has been administered to 35% of the country&#039;s population, with the goal of reaching 50% by the end of the year and 70% by the middle of 2022.', 'COVID-19 vaccine has been delivered to Myanmar for people over 55, and those over 45 will be immunized beginning October 17.', 'Since September 14, the COVID-19 vaccination has been expanded to include people aged 55 and up, people with disabilities, members and family members of ethnic armed groups, people from migrant groups and temporary camps, people with chronic and non-communicable diseases, and those over 45.', 'Myanmar has had access to the COVID-19 vaccine since January 2021.', 'The Ministry of Health encourages people to get the full dose of COVID-19 vaccine, and those who have already gotten the first dose to go to the nearest immunization clinic on or near the scheduled date for the second immunization, as well as to actively participate in the immunization and immunization program.', '', 7, 'EtrB7UYwjezL', 13, '2021-12-07 20:29:20', '2021-12-07 20:59:20'),
(54, 'According to residents, the explosion happened around 7:30 a.m. on December 7 near the old checkpoint on Yangon-Nyaungdon Road.', '7883826868_1c20629c38_c.jpg', '', '', '', '', '', 'The blast, which occurred near the old checkpoint used by the Yangon City Development Committee, left no one harmed.', '\"I awoke to the sound of a big bang. I assumed it was the sound of a tire popping. Later, I learnt that at the old checkpoint, a handmade explosive exploded. It is no longer operational, and no one has remained at the location. \"However, some police officers and troops are occasionally spotted at the checkpoint,\" a resident of Ward 3 in Hlaingthaya Township stated.', 'According to residents, another explosion happened on December 6 at around 4 p.m. in front of Kanthaya Park on Thudamma Road in Ward T, North Okkalapa Township.', '', '', '', '', '', 6, 'zCEwj1TXALvF', 11, '2021-12-07 20:41:13', '2021-12-07 21:11:13'),
(55, 'After Daw Aung San Su Kyi&#039;s sentencing, Myanmar&#039;s foreign minister travels to Cambodia.', 'Aung_San_Suu_Kyi_31_ott_13_050.jpg', '19519896350_1b9b3b8598_b.jpg', 'U_Wunna_Maung_Lwin.jpg', '', '', '', 'PHNOM PENH, Cambodia (Reuters) - Wunna Maung Lwin, Myanmar&#039;s military-appointed foreign minister, met with Cambodian officials on Tuesday (Dec 7), a day after the ruling military garnered international censure for jailing ousted leader Daw Aung San Suu Kyi for inciting and violating Covid-19 guidelines.', 'According to government handout photos, Mr Wunna Maung Lwin met Cambodian Prime Minister Hun Sen in the Peace Palace in Phnom Penh, with the two men tapping elbows in welcome before negotiations.\r\n\r\nAccording to Mr Eang Sophalleth, an assistant to the prime minister, Mr Hun Sen and Wunna Maung Lwin addressed bilateral relations, Asean challenges, and how to re-establish good relations within the grouping.\r\n\r\nMr Eang Sophalleth said the foreign minister also gave Mr Hun Sen an invitation to visit Myanmar on January 7 and 8, which he accepted.', 'Mr. Hun Sen will be the first government leader to visit Myanmar since the military took power in the country.\r\n\r\nCambodia will lead the 10-member Asean group, which includes Myanmar, next year.\r\n\r\nSince Ms Suu Kyi&#039;s administration was deposed in a military takeover on February 1 and she and others were jailed, Asean has seen differences among its members over its diplomatic efforts to resolve the problem in Myanmar.\r\n\r\nMyanmar boycotted the Asean summit in October after the region decided to invite a senior civil servant instead of the reigning military chief Min Aung Hlaing, but Mr Hun Sen said on Monday that military personnel should be welcomed to the organization&#039;s summits.', 'Myanmar has been in upheaval since the military took power, sparking huge protests and international worry over the end of fragile political reforms after decades of military rule.\r\n\r\nOn Monday, a Myanmar court found Aung San Suu Kyi guilty of inciting and violating coronavirus prohibitions, prompting international condemnation of what critics called a &quot;fake trial.&quot;', 'After a partial pardon from Myanmar&#039;s military ruler, she will serve two years in jail at an undisclosed location, down from four years.\r\n\r\nThe cases against Ms Suu Kyi, according to her supporters, are unfounded and intended to destroy her political career by tying her up in legal proceedings while the military consolidates power.', 'In Myanmar, her conviction was widely anticipated.\r\n\r\nDemonstrators in Myanmar&#039;s main city, Yangon, risked arrest to hold a flash protest shortly after the verdict, though no new demonstrations were reported on Tuesday.\r\n\r\nMr Hun Sen, who has been chastised by rights groups and Western governments for what they regard as his suppression of democracy, announced on Monday that he will travel to Myanmar to meet with the country&#039;s military leadership.', '', '', 6, 'r8CzXPbFE15f', 8, '2021-12-07 20:51:13', '2021-12-07 21:21:13'),
(56, 'Myanmar will remain a major problem for Asean, whether or not it is present at summits.', '14392562823_598ee64f9e_b.jpg', '', 'Map_and_flag_of_ASEAN_countries.png', '', '', '', 'BANGKOK, 1 NOVEMBER (Bernama) â€” Last Thursday, Asean&#039;s 38th and 39th Asean Summits and Related Summits came to a close, but the three-day virtual gathering was notable for the first time by the lack of a Myanmar delegate.', 'Only nine of the bloc&#039;s ten presidents were photographed at a series of virtual summits, with a blank gap and bold writing reading &quot;Myanmar&quot; in the position where the country&#039;s representation was scheduled to appear.\r\n\r\nOn October 15, the regional bloc agreed to exclude Senior General Min Aun Hlaing from the summit, instead requesting that the ruling military government nominate a non-political delegate to represent the country, which the military government declined. Myanmar&#039;s shadow administration, the National Unity Government, also asked the bloc to join the summits, but the EU declined.\r\n\r\nThe action against the military administration was initiated because there has been inadequate progress in implementing the ASEAN Leaders&#039; Meeting on April 24&#039;s Five-Point Consensus to seek reconciliation and restore peace in Myanmar.', 'The move by Asean Foreign Ministers is considered as crucial to maintain the grouping&#039;s legitimacy, despite the fact that it was an unprecedented snub. Despite Myanmar&#039;s absence from the meetings, Asean leaders expressed worry over the country.\r\n\r\nThe ruling military&#039;s unwillingness to send a non-political delegate, according to ISEAS-Yusof Ishak Institute fellow Moe Thuzar, reflects how Myanmar&#039;s State Administration Council (SAC) is attempting to exploit Asean&#039;s constructive involvement.\r\n\r\nThe SAC&#039;s rejection is in response to Asean&#039;s decision to keep the ruling military out of the summits.', '&quot;Whether from ASEAN or the SAC regime, ASEAN&#039;s message to Min Aung Hlaing regarding the country&#039;s commitment to the Five-Point Consensus is a priority for helping settle Myanmar&#039;s dilemma.&quot;\r\n\r\n&quot;It would have sent the incorrect message to the people of Myanmar and the world if Min Aung Hlaing had been invited to the summit,&quot; she told Bernama.\r\n\r\n&quot;However, the SAC&#039;s recent statements regarding Asean&#039;s decision seem to indicate the country&#039;s willingness to cooperate with Asean in the &quot;Asean spirit and Asean Way,&quot; so I hope this is an indication that the SAC understands its responsibilities as an Asean member state and what Asean means to Myanmar,&quot; she said.', 'Marzuki Darusman, a founding member of the Special Advisory Council for Myanmar (SAC-M), said the Asean special envoy to Myanmar must meet with the UN Security Council in New York and suggest that the council draft a resolution that unifies the international community&#039;s activities on a single track.\r\n\r\nHe stated that the resolution must acknowledge the illegality of the military takeover and the necessity to enact arms embargos, sanctions, and the release of all political detainees as a starting point.\r\n\r\n&quot;It must bind all parties to the Asean five-point consensus&#039; execution.&quot; &quot;The huge need for humanitarian assistance is of equal importance,&quot; said the former chair of the United Nations Independent International Fact-Finding Mission on Myanmar.', 'Senior General Min Aung Hlaing&#039;s failed leadership, according to Marzuki and Yanghee Lee, a founding member of SAC-M and former UN Special Rapporteur on human rights in Myanmar, has begun to show fractures, and the crisis may be reaching a breaking point.\r\n\r\n&quot;The junta has found itself in a bind. For the first time, the junta appears to be under significant strain from both within and beyond Myanmar. The junta&#039;s options are running out... But, as Marzuki pointed out, &quot;time is of the essence.&quot;\r\n\r\nBrunei&#039;s second Foreign Minister, Erywan Mohd Yusof, was designated as a special envoy to Myanmar in August to help mediate the negotiation process. The ruling military, on the other hand, has obstructed the Asean Special Envoy&#039;s requests, thereby barring him from carrying out his duty.', 'Erywan has been tasked with fostering trust and confidence in Myanmar by providing full access to all parties involved and laying out a clear schedule for implementing the ASEAN Leaders&#039; Meeting&#039;s Five-Point Consensus on April 24.\r\n\r\nInternal turmoil has erupted since Myanmar&#039;s ruling military, led by Senior General Min Aung Hlaing, deposed Aung San Suu Kyi&#039;s elected administration on February 1, with roughly 1,000 civilians slain by security forces. The ruling military disputes the fatality statistic.\r\n\r\nCambodia, the future Asean chair, has stated it will designate a new special envoy and press the country&#039;s military leadership to engage in conversation with its opponents, according to Reuters. Bernama -', '', 6, 'JEv9ICnAoLNq', 1, '2021-12-07 21:00:25', '2021-12-07 21:30:25'),
(57, 'The United Nations Security Council has expressed renewed concern about the Myanmar crisis.', 'Free_Myanmar_(Burma)_Protest_-_Portland_-_OR.jpg', '', 'Protest_in_Myanmar_against_Military_Coup_14-Feb-2021_11.jpg', '', '', '', 'BANGKOK, Thailand (AP) â€“ The UN Security Council released a statement expressing &quot;grave concern&quot; over the escalating bloodshed in Myanmar, where the military-installed administration is deploying force against opponents.', 'The Security Council&#039;s decision comes as Myanmar&#039;s army appears to be launching a major attack in the country&#039;s northwest, despite warnings that the country&#039;s humanitarian situation is rapidly deteriorating, with food shortages and a fragile public health system.\r\n&lt;br&gt;\r\nA press statement carries less weight than an official resolution, but it can help the Security Council members reach consensus on issues that would otherwise be impossible to resolve.\r\n&lt;br&gt;\r\nBecause two of its permanent members, Russia and China, have good relations with Myanmar&#039;s present administration, the council appears to be unable to take more serious action.', 'Myanmar&#039;s military seized control in February, deposing Aung San Suu Kyi&#039;s elected administration. The takeover was met with widespread public outrage, which was put down by the deployment of lethal force.\r\n&lt;br&gt;\r\nArmed resistance to military rule has erupted as a result, and numerous UN experts have warned that the Southeast Asian country risks devolving into civil war.\r\n&lt;br&gt;\r\n&quot;Steps to improve the health and humanitarian situation in Myanmar, including to support the equitable, safe, and unhindered transportation and distribution of COVID-19 vaccines,&quot; the Security Council said in a statement released on Wednesday in New York.', 'It also demanded &quot;unrestricted humanitarian access to all persons in need, as well as full protection, safety, and security for humanitarian and medical staff.&quot; The security situation in Myanmar, as well as the challenges aid organisations have in obtaining government authorization to operate in isolated areas, have severely hampered the supply of supplies.\r\n&lt;br&gt;\r\nBecause of rising war and insecurity, COVID-19, and a failing economy, the UN humanitarian director urged Myanmar&#039;s military leaders to provide unrestricted access to the more than three million people in need of life-saving aid.\r\n&lt;br&gt;\r\n&quot;This figure will only climb&quot; unless violence is stopped and Myanmar&#039;s situation is resolved peacefully, according to Martin Griffiths.', 'The latest statement restated the council&#039;s support for Myanmar&#039;s democratic transition, as well as its prior demand for the military to &quot;exercise extreme restraint.&quot;\r\n&lt;br&gt;\r\nThe government blames the violence on opposition groups, some of which have been labeled &quot;terrorist&quot; by the government.\r\n\r\nThe council also expressed its continued support for the Association of Southeast Asian Nations (ASEAN) in assisting in the resolution of the violence and political crisis.&lt;br&gt;', 'It urged for the implementation of a five-point plan proposed by ASEAN, which included a visit to Myanmar by the regional group&#039;s special envoy. The envoy&#039;s scheduled first visit to Myanmar was canceled after the administration refused to let him to see Aung San Suu Kyi, who has been incarcerated since the takeover and is facing charges that her supporters and others claim are false.\r\n&lt;br&gt;\r\nBecause of her legal situation, the envoy is unable to meet with her, according to the government.\r\n\r\nDue to its refusal to provide access, Myanmar&#039;s leader, Senior General Min Aung Hlaing, was denied entry to an ASEAN summit last month, an extraordinary rebuke to a fellow ASEAN member.', '', '', 6, '4YlO7kQoWGiw', 3, '2021-12-07 21:10:22', '2021-12-07 21:40:24'),
(58, 'Singapore is &quot;extremely concerned&quot; about the situation in Myanmar, according to the Ministry of Foreign Affairs.', '2007_Myanmar_protests_7.jpg', '', '', '', '', '', 'Singapore is a city-state in Southeast Asia. In response to media inquiries about recent events in Myanmar, a spokeswoman for the Ministry of Foreign Affairs (MFA) said on Tuesday (Dec 7) that Singapore &quot;remains profoundly concerned.&quot;\r\n\r\nThe Republic is also &quot;disappointed&quot; by the lack of &quot;concrete progress&quot; in implementing the Asean Five-Point Consensus, according to a statement from the Ministry of Foreign Affairs.\r\n\r\nOusted Aung San Suu Kyi, Myanmar&#039;s leader, was sentenced to four years in prison on Monday for inciting violence against the military and violating Covid-19 rules. On the same allegations, Myanmar&#039;s former president Win Myint was sentenced to four years in prison.', 'Min Aung Hlaing, the reigning military ruler, later commuted both of their sentences.\r\n\r\nSeparately, the UN on Monday called on Myanmar to prosecute anybody responsible for using excessive force against unarmed civilians after security forces allegedly slammed a car into anti-military protestors, killing five of them.\r\n\r\n', '&quot;We reiterate our call for the cessation of violence and constructive dialogue among all parties,&quot; the MFA said in a statement. &quot;We also urge the Myanmar military authorities to cooperate with the Asean Chair&#039;s Special Envoy on Myanmar to quickly and fully implement the Five-Point Consensus, including by facilitating the Special Envoy&#039;s visit to Myanmar to meet with all parties concerned.&quot;\r\n\r\nSingapore also wants all political detainees, including Aung San Suu Kyi, U Win Myint, and foreign detainees, released, as well as the Myanmar military authorities to avoid measures that might jeopardize eventual national reconciliation and peace and stability in Myanmar, according to the MFA.', 'The Asean road map for resolving the Myanmar problem, which has been in place for seven months, has made little progress.\r\n\r\nThis &quot;Five-Point Consensus&quot; demands for an end to political violence, humanitarian relief, and the establishment of an Asean special envoy to engage with all parties involved in Myanmar in order to develop inclusive political discussion.', 'While some assistance from the regional body has been sent to the troubled member, Asean&#039;s special envoy Erywan Yusof has not visited the nation since his appointment since the junta has refused to meet with ousted State Counsellor Aung San Suu Kyi.', '', '', '', 6, 'bP1VgtdwmZDh', 3, '2021-12-07 21:19:20', '2021-12-07 21:49:20'),
(59, 'After being prosecuted under Section 505 (a) of the penal code, actor Lu Min was arrested by police.', 'Lu-Min-social.jpg', 'maxresdefault.jpg', '', '', '', '', 'According to his wife Khin Sabai Oo, who went live on the Ayeyarwady Lu Min Facebook page, one of Myanmar&#039;s most famous actors, Lun Min, was arrested by police on the night of February 20 under Section 505 (a) of the penal code.\r\n\r\nShe stated during the live show that the police had arrested and taken him away, but she did not specify where he would be transferred.', '&quot;Ko Lun Min has been apprehended by the police!&quot; Several police vans took him away. I&#039;m not sure how or where I should proceed. They broke down the door to apprehend him and aggressively entered the residence. They didn&#039;t say where they were going to take my spouse. They apprehended him with vigour. I was powerless to stop them. I informed them of the route I needed to take. Is it the police station in Bahan Township? However, they did not respond. They claimed they had no idea. In a Facebook live broadcast, Khin Sabai Oo mourned, &quot;I shouted where my spouse would be taken and that I would also arrive.&quot;', 'According to a press release issued by the Tatmadaw (Military) True News Information Team on February 17, several famous movie stars and directors have been sued under Section 505 (a) of Myanmar&#039;s penal code after being accused of encouraging civil servants to join the ongoing civil disobedience movement (CDM).', 'Film performers Lu Min and Pyay Ti Oo, directors Waing, Ko Pauk, and Na Gyi, and vocalist Anat Ga are all facing sedition accusations.', '', '', '', '', 10, 'gEshm7t9kRBY', 1, '2021-12-07 21:35:58', '2021-12-07 22:05:58'),
(60, 'A look inside the life of San Yati Moe Myint, an actress.', 'San_Yati_Moe_Myint.jpg', '', '', '', '', '', 'Her father was a famous photographer, and she was born on June 3 to four siblings. It might be stated that her father instilled in her the desire to be an artist. She and her siblings would often play together, becoming acquainted with and admiring all of the actors, actresses, models, and others that came to her father&#039;s photo studio. She claimed that it was then that she discovered her affinity for acting, dancing and singing along to a variety of TV commercials that were prevalent throughout her childhood.', '&quot;When I was a kid, my teacher asked the class the standard question: &quot;Who do you want to be when you grow up?&quot; I was the only one in the class who stated that she aspired to be an actress. She&#039;d also tell my curly-haired little sister that I&#039;d grow up to be an actor. Since then, I believe it has stayed with me the entire time &quot;San Yati Moe Myint expressed his longing in a nostalgic tone.', 'She attended No. 1 Dagon Middle School from 1st to 8th grade before transferring to No. 2 Dagon (Myoma) High School for 9th and 10th grades. While she recalls excelling in academics as a child, as she grew older and devoted more of her time to school events, her grades became average. When it was time to start university, she went to Stars International Models Agency to train, which was the beginning of her entertainment career.', 'She achieved success in a relatively short period of time, receiving several offers to appear on the covers of magazines and other publications. She believes that her quick rise to success was aided by the fact that both of her parents worked in the same field. Despite having a significant popularity for a teenager her age, she had her share of problems.', 'When she first started acting, she struggled to adjust to certain roles and had a general lack of understanding of the video production process as a whole. She had to study and learn to overcome her flaws on a regular basis. Her efforts were rewarded when she was offered roles in roughly a hundred video movies. Her workload decreased as the video era faded, allowing her to be more choosy in her future appearances in movies and TV shows, depending on the character she was cast as and the plot.\r\n\r\nSince then, she has appeared in over 200 films, as well as numerous commercials, music videos, and other projects.', 'She also claims that she worked hard to attain the lean figure she has now, despite the fact that she began with a full body. Whenever she had free time, she focused on sculpting a body that befitted a famous actress and model.\r\n\r\n&quot;When I took a hiatus, I intended to reappear in front of my audience with a completely different appearance. My face, I&#039;m pleased with how my mother gave birth to me. But because my physique was overweight, I began with a diet and then went to the gym hard. And the results were unmistakable. It provided me a lot of self-assurance, regardless of the outfits I choose to wear to an occasion. I&#039;d like to emphasize that if you have the desire and determination to change, it&#039;s never too late &quot;San Yati Moe Myint stated.', 'She is now working on a TV series and a film. When she has leisure time, she enjoys doing charity work, particularly with animals.', '', 10, 'TCBYU8rhuyNR', 2, '2021-12-07 21:46:30', '2021-12-07 22:16:30'),
(61, 'After media reports of five people being killed, the United Nations has called on Myanmar to stop using excessive force.', 'Protest_in_Myanmar_against_Military_Coup_14-Feb-2021_07.jpg', '', 'download.jpeg', '', '', '', 'YANGON, Myanmar (Reuters) - According to media reports and eyewitnesses, security personnel slammed a car into protestors, killing five of them. The United Nations has called on Myanmar to prosecute anybody responsible for using excessive force against unarmed civilians.', 'On Sunday (Dec 6) in Yangon&#039;s major city, photographs and images uploaded on social media showed a speeding vehicle plowing into a throng of anti-military takeover demonstrators, with dead laying on the road. Reuters reported that scores of people were injured.\r\n\r\nMr Ramanathan Balakrishnan, the UN resident coordinator in Myanmar, said in a statement that &quot;those guilty for the use of excessive and disproportionate force against unarmed civilians must be held accountable.&quot;', 'The event occurred minutes after a &quot;flash mob&quot; of citizens protesting a military takeover on February 1 organized, according to the Myanmar Now news portal. It went on to say that at least five individuals had died and that 15 people had been arrested.\r\n\r\nSecurity personnel dispersed an unlawful riot and arrested eight demonstrators, according to Myanmar&#039;s state-run Global New Light newspaper. Three individuals were injured, but no deaths were mentioned, and those arrested will face legal consequences, according to the report.', '&quot;Horrified by allegations that security forces opened fire on, ran over, and murdered many peaceful protestors,&quot; the US embassy stated in a statement.\r\n\r\nDespite the deaths of over 1,300 people since the February takeover of an elected government led by Nobel laureate Aung San Suu Kyi and the resumption of military rule, anti-military rallies have continued.\r\n\r\nOn Sunday, one of the demonstrators said he had collapsed after being hit by a car before fleeing.', '&quot;I was beaten with a rifle by a soldier, but I defended myself and pushed him back. Then, as I rushed away in a zig-zag pattern, he fired a shot at me &quot;For security reasons, the demonstrator did not want to be recognized by phone, according to Reuters.\r\n\r\nAccording to two witnesses, the soldiers&#039; car collided with the mob from behind. Soldiers pursued the fleeing demonstrators, arresting and restraining several of them.\r\n\r\nAccording to witnesses, some were injured with head wounds and rendered unconscious.', 'Reuters attempted to contact a military spokeswoman for comment on the event, but he did not respond.\r\n\r\nThe military has previously claimed that protestors who were murdered initiated the violence. It claimed the military takeover was organized because Suu Kyi&#039;s party won a rigged election in November last year.\r\n\r\nAt the time, the election commission disregarded the claim.\r\n\r\nSuu Kyi, who is 76 years old, is facing a slew of legal charges, including provocation and violations of Covid-19 rules. The charges, according to her supporters, are politically motivated.', '', '', 6, 'gAVPNCEeHX6k', 4, '2021-12-07 21:54:33', '2021-12-07 22:24:33'),
(62, 'Hun Sen, the Cambodian leader, claims Myanmar&#039;s ruling military has the right to attend Asean meetings.', 'Hun_Sen_(2016).jpg', '', 'download (1).jpeg', '', '', '', 'PHNOM PENH, Cambodia (Reuters) - Cambodian Prime Minister Hun Sen said on Monday (Dec 6) that he plans to visit Myanmar to speak with the country&#039;s military authorities, and that ruling military officials should be invited to ASEAN summits (Asean).', 'Myanmar&#039;s status as a member of the 10-nation Asean has been brought into the spotlight following a military takeover on February 1. Military leader Min Aung Hlaing was not invited to the annual summit of group leaders in October, held by Brunei, after members failed to reach an agreement.\r\n\r\nMr Hun Sen, on the other hand, stated on Monday that while Cambodia will host the regional bloc for the next year, all ten members will be represented.', 'He said during an inauguration ceremony for a Chinese-funded building project, &quot;It&#039;s a family member of Asean, they must have the rights to attend meetings.&quot;\r\n\r\nMr Hun Sen indicated in his remarks that he would likely visit Myanmar soon after Myanmar&#039;s military-appointed foreign minister visits Cambodia on Tuesday.', '&quot;There&#039;s a good chance I&#039;ll travel to Naypyidaw to meet General Min Aung Hlaing and collaborate with him. Who can I work with if I can&#039;t work with the leadership?&quot; Hun Sen stated.', '&quot;Under the Asean charter, no one has the right to expel another member,&quot; Mr Hun Sen underlined, referring to Asean&#039;s long-standing convention of not interfering in each other&#039;s domestic affairs.\r\n\r\nMyanmar has been in turmoil since General Min Aung Hlaing deposed Nobel Laureate Aung San Suu Kyi&#039;s civilian administration on February 1.', '', '', '', 6, 'EYIkUZHRTW9A', 5, '2021-12-07 22:02:43', '2021-12-07 22:32:43'),
(63, 'Myanmar is trying to reintroduce international tourists by the beginning of 2022.', 'songkran-1.jpg', '', '3698558048_ed15b2f006_b.jpg', '', '', '', 'BLOOMBERG YANGON (BLOOMBERG) YANGON (BLOOMBERG) YANGON (B According to Union Minister for Hotels and Tourist Htay Aung, Myanmar is nearing completion of procedures to reopen its tourism sector to foreigners early next year, with an initial focus on travelers from Southeast Asia.', 'The attempt comes as new Covid-19 infections have slowed in the 55-million-strong country, prompting the relaxation of an inter-provincial travel prohibition.\r\n\r\nMr Htay Aung added that the softening and traditional holidays have already prompted several inhabitants to take vacations.', '&quot;We&#039;re making the required arrangements for travel bubbles with Thailand,&quot; he said in an interview, &quot;so that we&#039;ll be ready when they reach out to us through an official channel.&quot; &quot;In the first quarter of 2022, we hope to reopen to Cambodia, Laos, and Vietnam.&quot;\r\n\r\nAccording to him, the goal is to open so that Thai tourists may safely visit major tourist spots in and surrounding Kawthoung, Myeik, Dawei, Tachileik, and Kyaington.', 'Myanmar is bordered by five countries: Thailand, China, India, Bangladesh, and Laos, and international commercial aircraft are still prohibited.\r\n\r\nThailand said last week that from November 1, fully vaccinated travelers from certain countries will be exempt from quarantine, in order to boost the country&#039;s tourism economy.\r\n\r\nMr Htay Aung estimates that 300,000 foreigners will visit during the first phase of the reopening.', 'Despite the fact that half of the country&#039;s hotels and guest houses have shut down, he claims that roughly 90,000 rooms remain accessible.\r\n\r\nThe Kempinski Group, Europe&#039;s oldest luxury hotel company, said last week that it would close its Naypyitaw location due to &quot;present circumstances.&quot;\r\n\r\nMyanmar has been ruled by the military since a military coup in February toppled Ms Aung San Suu Kyi&#039;s civilian government.', 'The political upheaval compounded the pandemic&#039;s and its consequences.\r\n\r\nAccording to the Asian Development Bank&#039;s latest study, the economy shrank by 18.4% in the fiscal year ended September 30, with no forecast for fiscal 2022 due to a &quot;uncertain situation.&quot;\r\n\r\nAccording to the World Travel and Tourism Council, tourism contributed roughly 6% of Myanmar&#039;s gross domestic product in 2019 before the pandemic.', '&quot;The potential is there,&quot; Mr Htay Aung said, &quot;but it will take years to go back to where we were before the pandemic.&quot;', '', 6, 'KeXN4kJVLs7Z', 9, '2021-12-07 22:08:35', '2021-12-07 22:38:35'),
(64, 'Discuss the rights and duties of a citizen', 'Discuss the rights and duties of a citizen.jpg', '', '', '', '', '', 'Almost every moden state, especially a democracy, allows its citizen to perform certain duties. Among the enjoyed by the citizens in a democracy are the right to pursue his own affairs as he prefers; the right to express his views, however silly they may appear to others, and the right to move about as he pleases. The citizen is considered so important that his rights are protected by the law of the state, and whenever they are infringed, he can secure redress. But in a totalitarian state, the rights of the citizen are so restricted that he has practically no freedom.', 'The citizen is supposed to exist for the state. His interests are always subordinated to those of the state. Thus, his duties exceed his rights. Even in a democracy, however, the citizen is expected to exercising his rights within the limits of the law. He should not do or say anything that may affect the rights of others.In exercising his righit to act as he pleases, for example, he should not try to elope with othe man&#039;s wife or say anyhing slanderous about her or anyone. In the same way, his actions should not cause injury or damage to any individual or his property. He cannot kill as he pleases. If his conduct infringes the rights of others, then those who have been affected by his misconduct, could take legal action against him and he will be punished according to the law of state.', 'In this way, the state protects its citizens and their rights from the thoughtlesseness of any individual in the state. This means, of course, that every citizens in the state in expected to do his duty to his fellow citizens.The citizen is also expected to give his services for the protection of the state in times of war, and to maintain law and order in his state, at all time. Thus, every citizen who is conscious of his rights should also be conscious of his duties to the state and his fellow-citizens.', '', '', '', '', '', 11, 'EqOKfVZkhu7b', 4, '2021-12-15 20:08:27', '2021-12-15 20:38:27'),
(65, 'Media Sector knowsnas the Fourth Estate in Mynmar', 'Media Sector knowsnas the Fourth Estate in Mynmar.jpg', '', '', '', '', '', 'The Media called as the fourth estate in Myanmar is concerned in giving knowledge and actual news incidents to the public Besides, it obligates to watch, comment and confute matters such as exacting, administration and judiciary. Watching, commenting and confuting are main tasks of the fourth estate.', 'Nowadays, the systematic government including democrats has given the permissions to publish private newspapers,jeanals and magazines and to transmit the television sectors. All people in the country saw the authorization that the government confided to write freely. The media council was formed. It carried out to get fredoom of media to stand fimly with responsbilities.', 'The chance of free writing and living in is equally for every nationality but not for only one. So, eveyone must heed not to abase others, especially, not to make depredation of environment. Every nationality must have to believe freely, to look on something and to write and publish according to the Act No.354 of the constitution of Myanmar.', 'In spite of having pemissions to do everything free, if one writes without wisdom and irrationality, the state cannot get to the route of democracy. There will be knotty problems. Till be far from the real democracy everyone wants eagerly. In November and December, 2016, Rohinger violences occured in Rakhaing State, Myanmar. The international media published the wrong in journals and newspapers about Rohinger cases. It has been seem that they did not keep etiquetes of media.', 'The wrong news concerning Myanimar is the tollowing: some are-Writing incorrect news about Cambodia&#039;s event that is not true without concerning with of Myanumar soldiefs from the Daily Mail newspaper in England,1. In the Independence newspaper based on Singapore, tilting Daw Aung San Hsu Kyi with wrong leaflets and 3. Experiencing problems of artificial photos and video files about affairs of Rakhaing State published by the Guardian newspaper. Myanmar responded with valid evidences that they all are not improper but they did not apologize without responsibility.The media in Myanmar must realize that incorrect news can cause national conflicts. In conclusion, the media known as the fourth estate in Myanmar must avoid writing and presenting on incorrect news.', '', '', '', 6, 'WSxZOeyl3X6H', 4, '2021-12-15 20:13:52', '2021-12-15 20:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(6, 'Local News'),
(7, 'Health'),
(10, 'Entertainment'),
(11, 'Knowledge');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `sitename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `sitename`, `logo`, `modified_date`) VALUES
(1, 'YaThaSone', 'favicon.png', '2021-01-17 16:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `pic`, `role`, `created_date`, `modified_date`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$xpOtcNFDywhGFL4vGKE6BuZviPLVL5bsbpYzez1qH70LmUrbzRJAy', 'CpDHXrjR6N7I', 1, '2021-01-13 10:07:56', '2021-01-13 10:07:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
