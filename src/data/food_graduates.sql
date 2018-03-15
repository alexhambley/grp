-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 12:28 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g52grp`
--

-- --------------------------------------------------------
--
-- Table structure for table `Users`
CREATE TABLE Users (
    UserId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) NOT NULL UNIQUE,
    Password VARCHAR(1000) NOT NULL,
    Phone VARCHAR(30) NOT NULL UNIQUE,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Birthday VARCHAR(20) NOT NULL,
) ENGINE = InnoDB;

--
-- Table structure for table `element`
--

CREATE TABLE `element` (
  `id` int(11) NOT NULL,
  `elementname` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(800) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `element`
--

INSERT INTO `element` (`id`, `elementname`, `description`) VALUES
(1, 'Academic Expertise', 'Evidence of the required level of academic ability whether by degree calibre, further study or specific competencies such as research, evaluation, speaking or writing.'),
(2, 'Acceptance of Ambiguity', 'Appreciation that there may be different ways of achieving a result or more than one positive outcome.'),
(3, 'Adaptability', 'A constructive approach to handling change.'),
(4, 'Application of IT', 'The ability to work confidently with spreadsheets and other computer packages and have additional skills with other software, databases or systems as the role requires.'),
(5, 'Collaboration', 'Working with others for mutual benefit.'),
(6, 'Commercial Awareness', 'The required skills to develop a competitive business in terms of supply chain efficiency, market performance, product development & costings.'),
(7, 'Confidence', 'Having the self-assurance to process information and situations and then undertake the required actions.'),
(8, 'Critical Thinking', 'Objectively analysing the facts and situations of an issue to form an evaluated judgement.'),
(9, 'Cultural Sensitivity', 'Appreciation of different cultures and practices that impact on ways of working and customer needs such as religious and dietary requirements.'),
(10, 'Decision Making', 'Making a considered response to an issue.  Taking direct action or escalating as appropriate to gain traction on the matter.'),
(11, 'Digital Capabilities', 'The ability to work effectively and communicate using all available technology for maximum impact.'),
(12, 'Emotional Intelligence', 'Understanding yourself, others and the situation then adapting how you work for best results.'),
(13, 'English Proficiency', 'Possessing the required level of English understanding to give effective communication of all types.'),
(14, 'Entrepreneurship', 'To see an opportunity and exploit it for beneficial effect.'),
(15, 'Environment and Sustainability', 'Feeding the world, looking after the planet.'),
(16, 'Global Supply Chain', 'Appreciation of how to operate a successful food business across nations, commercially, in light of current issues and most importantly ensuring robust transparency.'),
(17, 'Handling Data', 'The ability to understand, manipulate and present data with confidence (this may include handling large and complex data sets).'),
(18, 'Independence', 'Capacity for self-directed operation.'),
(19, 'Initiative', 'Taking active steps when you see it\'s needed, without prompting.'),
(20, 'Innovation', 'Generating an idea or item that\'s better or original.'),
(21, 'Leadership', 'The ability to gain the respect, trust and confidence of others, which realises the best in people to deliver success in the workplace.'),
(22, 'Listening', 'Providing the correct environment to allow for engaging discourse and ensuring the required comprehension has been gained.'),
(23, 'Multicultural Workplace', 'Ability to embrace and maximise the benefits of working with colleagues and associates from all over the world.'),
(24, 'Negotiation and Influencing', 'Getting the best outcomes for all parties by being persuasive in your approach when working towards an objective. '),
(25, 'Networking and Relationship Building', 'Positive approach to establishing suitable internal and external contacts and then nurturing these links to allow for optimum working connections.'),
(26, 'Open-Minded', 'Willing to consider new ideas or the points of view of others.'),
(27, 'Passion for Subject', 'Finding the Food Industry fascinating.'),
(28, 'Personable', 'Social qualities that are likeable to others in a variety of contexts.'),
(29, 'Personal Responsibility', 'Being fully aware of what you are accountable for and owning all outcomes, good or bad.'),
(30, 'Planning and Organising', 'Remaining in control of activities under your responsibility and completing tasks to agreed deadlines.'),
(31, 'Positive Attitude', 'Proactive and constructive in communications and tasks.'),
(32, 'Professionalism', 'Having personal presentation and behaviours appropriate for your business.'),
(33, 'Questioning Approach', 'Taking genuine interest in finding out the answer or challenging the status quo.'),
(34, 'Reliability', 'Trustworthy, consistent in meeting objectives and never letting you down.'),
(35, 'Resilience', 'Responding positively to adverse situations and persevering.'),
(36, 'Resourcefulness', 'Finding a way to achieve your goals and overcome problems.'),
(37, 'Self-Awareness', 'Understanding what you can do well and how you may be perceived by others and then developing your contributions and behaviours positively.'),
(38, 'Self-Development', 'Owning your own future development in your current role and beyond.'),
(39, 'Self-Motivated', 'Delivering energy and just getting on with it!'),
(40, 'Specific Technical Aspects', 'Demonstration of experience or knowledge in your field or a particular scientific area the employer deems essential or desirable to fulfil the role.'),
(41, 'Teamworking', 'Valuing the contributions of others and being committed to getting the best out of working together towards a common goal.'),
(42, 'The Mechanics of Business', 'Appreciation of generic commercial aspects of handling money such as types of costs, profits, reports & risk.'),
(43, 'Thoroughness and Attention to Detail', 'Meticulous, careful and accurate.'),
(44, 'Values and Credibility', 'Understanding and respect for ethical and social considerations pertinent to the larger food industry and your specific sector; this includes authenticity matters.'),
(45, 'Verbal Communication', 'Consciously choosing the content and style of your delivery to suit the target audience whatever the size and context. Checking your message has been understood.'),
(46, 'Work Experience', 'Proven record of relevant employment, to demonstrate understanding of workplace expectations (this may be stipulated as food industry based).'),
(47, 'Working Under Pressure', 'Establishing your personal approach to balancing demands and challenges in working life.'),
(48, 'Written Communication', 'Producing clear structured work in a precise way that can be clearly followed by the intended audience.');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `entry` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(800) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `names` varchar(400) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `elements` varchar(400) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `themes` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `entry`, `description`, `names`, `elements`, `themes`) VALUES
(1, 'Auditing Roles (not single factory based)', 'Cross site, systems, compliance and supplier auditing roles are included here. This section does not include in-factory roles e.g. shift QA Auditor.', 'Compliance Auditor,Supplier Auditor,Company QA Auditor', ',7,10,12,21,22,24,30,32,33,35,45,47,48,', 'D4,D5'),
(2, 'Company Graduate Scheme', 'Fairly simple - 2-3 year contracts. There may be 2 or 3 posts undertaken, possibly on a number of sites plus extra central training or support provided over the period by the company. On completion usually offered a permanent role in a technical or other field.', 'Technical Graduate Scheme,Retail Graduate Scheme,Graduate Scheme', ',2,3,9,10,21,27,29,31,38,39,41,47,', 'D0'),
(3, 'Customer Support Technologist', 'The person will be in either customer support in a food company or working for a consultancy rather than a manufacturer. If pure NPD customer support then more suited to Development or Process Technologist option.', 'Customer Support Technologist,Consultant Technologist,\'Consultant\' or \'Customer\' in the Role Title', ',2,6,7,13,22,24,25,30,31,34,35,36,39,45,', 'D8,D5,D3,D1,D4'),
(4, 'Factory Based Technologist', 'Classic QA Auditor, QA Technologist, Intake Technician, Food Safety/Hygiene Technologist. Factory based routine roles. Could be microbiologically centred. Emphasis that all are based in a single factory and do not include large amounts of cross-site or off-site work (such as a supplier auditor)', 'QA Technician,QA Technologist,Quality Auditor,Food Safety Auditor,Quality Technician,Technical Auditor,Raw Materials Technologist', ',3,8,10,19,21,24,30,33,34,36,41,43,47,', 'D4,D7'),
(5, 'Laboratory Technician or Technologist', 'The emphasis here is that the role will be mainly lab based, either analytical or microbiological. The job could be in industry, technical services, contract labs or academia. (research technician would be associate Research or Materials Technician - Technologist)', 'Laboratory Technician,Microbiology Technician,Analytical Technologist,Microbiologist (check lab based)', ',17,29,30,31,34,35,37,38,43,47,', 'D7'),
(6, 'Law and Regulatory New Graduate Role', 'The emphasis here is that the role will be mainly paper based and link to UK, EU or Government Policy or law based. It could also be with an Accreditation or larger auditing body (if not an auditor role). It may be working with new or existing material for food law, safety, quality, authenticity, consumer protection and this area will be increasingly relevant during Brexit. The roles could be in a government advisory/compliance body, technical service company, retailer or a larger food manufacturing company.', 'Sustainability policy assistant,Regulatory technologist,Regulatory Affairs Officer,Scientific Affairs Assistant/Officer', ',7,8,27,29,31,32,33,34,35,41,43,45,47,48,', 'D7,D1,D3'),
(7, 'NPD, Development or Process Role', 'Can be development of new products (NPD), existing or improvement of processes themselves. Most are a combination of 2 or more of these. Can be employed in small to large businesses and some are retailer facing, others branded. A large variety of role titles and salaries but a classic graduate entry point.', 'NPD Technologist,Development Technologist,Process Development Technologist,Process Technologist,NPD Process Technologist,Product Developer', ',3,5,6,14,19,20,26,27,33,41,42,46,', 'D6,D8'),
(8, 'Nutritional Graduate Role', 'The emphasis here is that the role will be nutritionally focussed and not development, lab or product improvement based. More of an advisory role and likely pan-site/business or head office based.', 'Nutritionist,Nutritional Analyst,Nutritional Assistant', ',1,5,9,13,22,25,26,27,28,31,32,38,40,45,', 'D5,D3,D7,D2'),
(9, 'PhD or other Postgraduate Research Role', 'The key thing here it is not another taught course and it is largely at an academic institution.', 'PhD Studentship,MRes (usually 1 year),MPhil,DTP - Doctoral Training Partnership', ',1,2,4,8,14,17,18,19,20,33,35,39,40,48,', 'D3,D6,D4,D1'),
(10, 'Research or Materials Technician or Technologist', 'Can be specific to types of materials (e.g. ingredients or packaging) or based on research on new material, processes or innovation. Not primarily lab based. Can be employed in larger businesses\' technical centres, technical services, academia and research institutes.', 'Ingredient Technologist,Packaging Technologist,Research Scientist,Senior R&D Technician,Process Innovation Technologist', ',1,13,17,18,19,25,27,32,34,39,41,45,48,', 'D3,D6'),
(11, 'Retail Technologist', 'This is opposed to the graduate scheme entry point. It may pan out into a number of areas (technologist, nutrition, consumer, ICT, ethics, 3rd party, category, writing) but traditionally direct entry is via a technologist route. This also includes food service roles where the business is not manufacturing; so the setup is similar.', 'Retail Technologist,Retail Food Technologist,Technologist Food Service,Product Technologist', ',6,7,10,12,15,19,20,23,32,33,35,37,42,44,', 'D2,D4,D8'),
(12, 'Sensory Technologist Graduate Role', 'The role will be focussed purely on Sensory properties and may not be food (could be fragrance, toiletries or consumer goods). May have roles with specific consumer facets and title names. The roles could be in a larger food manufacturing company, technical centre or a specialist advisory company or consultancy.', 'Sensory Technologist,Sensory Scientist,Consumer Sensory Technologist,Sensory Analyst', ',4,5,9,13,17,18,22,23,28,41,45,', 'D5'),
(13, 'Specifications or Quality Systems Technologist', 'The role will be largely desk based and not in the factory. May have roles with specific customers or raw materials. Could be working on codes of practice or quality systems for the factory. The roles could be in food manufacturing sites, technical centres or at a retailer.', 'Specifications Technologist,Vendor Assurance Technologist,Quality Systems Technologist,Technical Officer,Food Technologist', ',4,7,11,13,17,24,29,30,34,43,44,48,', 'D3,D7'),
(14, 'Sustainability, Environmental, Ethical, or Threat Management Roles', 'A mixed bag here but important to include the non-traditional and emerging aspect of the Food Industry that Food Scientists (amongst others) may take roles in.', 'Sustainability Officer,Environmental Technologist,Vulnerability,TACCP/Threat', ',2,5,8,15,16,17,22,26,44,45,48,', 'D2,D3,D5,D1,D6');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `theme_id` varchar(4) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `themename` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `explanation` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `elements` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `theme_id`, `themename`, `explanation`, `elements`) VALUES
(0, 'D0', 'Desirability for a general level of competence across all themes', 'Data indicates a desirability for a general level of competence across all themes', NULL),
(1, 'D1', 'Positivity', 'Having the behaviours that drive success and wellbeing in the workplace', '7,19,39,35,29,31,3'),
(2, 'D2', 'Appreciation of the Wider World', 'Engaging and embracing values, processes and ways of working in the industry with a diverse perspective.', '15,44,9,23,16,14,42'),
(3, 'D3', 'Data, Numbers and Communications', 'The ability to embrace information of all types, then use it and disseminate to best advantage.', '4,17,40,48,1,11,45,13'),
(4, 'D4', 'Getting the Job Done and Tackling Problems', 'Identifying and overcoming challenges to find solutions and reach your goals.', '10,8,18,36,30,21,2,24'),
(5, 'D5', 'Working Well with Others', 'Using a variety of styles for effectiveness and synergy in your relationships and activities with others.', '41,22,24,45,12,5,28,25,37,13,9,21'),
(6, 'D6', 'Innovation and Inquiry', 'Creativity in mind, approach and method to find new opportunities and enable results.', '20,14,26,27,1,33,38,5'),
(7, 'D7', 'Dependability', 'Harnessing your experiences and skills to establish trust in your ability to deliver.', '43,47,34,46,32,30,29'),
(8, 'D8', 'The Business World', 'Appreciation of systems and drivers that produce successful operational performance and profit.', '6,42,16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `element`
--
ALTER TABLE `element`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `element`
--
ALTER TABLE `element`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
