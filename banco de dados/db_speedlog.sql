-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Abr-2023 às 16:53
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_speedlog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL,
  `usuario_administrador` varchar(255) NOT NULL,
  `senha_administrador` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id_administrador`, `usuario_administrador`, `senha_administrador`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartoes`
--

CREATE TABLE `cartoes` (
  `id_cartao` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `nome_cartao` varchar(255) NOT NULL,
  `numero` varchar(19) NOT NULL,
  `data_validade` varchar(5) NOT NULL,
  `cvv` int(3) NOT NULL,
  `bandeira` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cartoes`
--

INSERT INTO `cartoes` (`id_cartao`, `cod_cliente`, `nome_cartao`, `numero`, `data_validade`, `cvv`, `bandeira`) VALUES
(0, 51, 'Rafael Pereira', '4342 3423 4234 2342', '02/28', 534, 'mastercard'),
(1, 51, 'Pedro antonio', '7887 5363 6346 3463', '02/27', 634, 'visa'),
(3, 3, 'Junior Leno', '4297 8705 3756 8868', '12/25', 789, 'visa'),
(4, 53, 'Rafael Pereira', '7654 7457 5475 4745', '02/28', 876, 'mastercard'),
(5, 8, 'Claudio Silva', '7657 4565 2324 2342', '09/37', 352, 'mastercard');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `cpf_cliente` varchar(20) NOT NULL,
  `nome_cliente` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email_cliente` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telefone_cliente` varchar(150) NOT NULL,
  `cod_verificacao` text NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'imagemPadrao.png',
  `status` int(5) DEFAULT NULL,
  `last_seen` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cpf_cliente`, `nome_cliente`, `username`, `email_cliente`, `password`, `telefone_cliente`, `cod_verificacao`, `foto`, `status`, `last_seen`) VALUES
(3, '773.335.093-96', 'Miranda Sykes', 'Horton', 'mirandasykes@gmail.com', '202cb962ac59075b964b07152d234b70', '(11) 18547-7127', 'T8D1Y1', 'imagemPadrao.png', 1, '2022-08-11 09:29:29'),
(5, '281.768.116-56', 'Erich Sweet', 'Morse', 'erichsweet948@gmail.com', '202cb962ac59075b964b07152d234b70', '(78) 91012-8334', 'J4A3H7', 'imagemPadrao.png', 1, '2022-06-15 07:13:47'),
(8, '857.771.243-13', 'Lane Reyes', 'O\'brien', 'lanereyes@gmail.com', '202cb962ac59075b964b07152d234b70', '(70) 34864-2440', 'U3W7J2', 'imagemPadrao.png', 1, '2022-06-17 18:02:56'),
(12, '217.905.712-81', 'Odette Frank', 'Nguyen', 'odettefrank2769@gmail.com', '202cb962ac59075b964b07152d234b70', '(11) 21358-2898', 'U4C3X7', 'imagemPadrao.png', 1, '2023-05-25 13:08:17'),
(13, '294.854.853-39', 'Zachary Jacobs', 'Sandoval', 'zacharyjacobs@gmail.com', '202cb962ac59075b964b07152d234b70', '(74) 82775-8633', 'G1Q6V5', 'imagemPadrao.png', 1, '2022-04-22 13:35:04'),
(15, '178.145.053-22', 'Venus Tran', 'Patrick', 'venustran@gmail.com', '202cb962ac59075b964b07152d234b70', '(56) 30570-3748', 'U8Z6J8', 'imagemPadrao.png', 1, '2023-08-11 05:41:43'),
(18, '234.434.732-85', 'Octavius Salas', 'Barrera', 'octaviussalas3458@gmail.com', '202cb962ac59075b964b07152d234b70', '(54) 66780-8277', 'X2T7O1', 'imagemPadrao.png', 1, '2022-09-01 22:08:21'),
(19, '873.737.609-51', 'Myles Beck', 'Austin', 'mylesbeck1153@gmail.com', '202cb962ac59075b964b07152d234b70', '(62) 17385-5763', 'K1E4N2', 'imagemPadrao.png', 1, '2023-07-20 12:11:48'),
(20, '457.986.083-43', 'Isabelle Thomas', 'Hanson', 'isabellethomas@gmail.com', '202cb962ac59075b964b07152d234b70', '(71) 41216-4266', 'P4F3T6', 'imagemPadrao.png', 1, '2024-01-27 15:48:30'),
(21, '931.264.746-29', 'Reece Ball', 'Mosley', 'reeceball1064@gmail.com', '202cb962ac59075b964b07152d234b70', '(50) 67766-7321', 'B5F5H9', 'imagemPadrao.png', 1, '2023-07-24 04:28:34'),
(22, '324.053.491-33', 'Ramona Harvey', 'Merritt', 'ramonaharvey1017@gmail.com', '202cb962ac59075b964b07152d234b70', '(83) 53836-1183', 'X6V8U2', 'imagemPadrao.png', 1, '2024-02-16 09:03:10'),
(23, '600.384.798-54', 'Rhoda Wilkins', 'Prince', 'rhodawilkins2917@gmail.com', '202cb962ac59075b964b07152d234b70', '(87) 36757-4253', 'O1Q1H5', 'imagemPadrao.png', 1, '2023-09-25 22:58:18'),
(24, '387.128.014-05', 'Madonna Bryan', 'Perry', 'madonnabryan2792@gmail.com', '202cb962ac59075b964b07152d234b70', '(58) 64036-4688', 'B4L0L5', 'imagemPadrao.png', 1, '2022-08-20 13:05:20'),
(25, '884.130.955-76', 'Fuller Griffith', 'Wade', 'fullergriffith8578@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 87651-3481', 'E3H2P5', 'imagemPadrao.png', 1, '2024-03-22 21:08:20'),
(26, '647.581.127-55', 'Kim Stephenson', 'Flowers', 'kimstephenson@gmail.com', '202cb962ac59075b964b07152d234b70', '(80) 24724-3948', 'U0M3H9', 'imagemPadrao.png', 1, '2023-10-23 10:29:30'),
(28, '258.924.282-74', 'Lenore Dodson', 'George', 'lenoredodson4367@gmail.com', '202cb962ac59075b964b07152d234b70', '(71) 57517-8454', 'N7R1H8', 'imagemPadrao.png', 1, '2024-03-22 19:04:10'),
(29, '552.533.966-13', 'Imelda Hobbs', 'Wright', 'imeldahobbs@gmail.com', '202cb962ac59075b964b07152d234b70', '(46) 34851-9048', 'P6E7G2', 'imagemPadrao.png', 1, '2023-11-07 01:08:03'),
(31, '806.119.053-61', 'Larissa Henson', 'Padilla', 'larissahenson@gmail.com', '202cb962ac59075b964b07152d234b70', '(63) 85723-1167', 'P7A8L8', 'imagemPadrao.png', 1, '2023-07-24 12:56:47'),
(32, '713.656.244-76', 'Davis Burks', 'Hansen', 'davisburks9690@gmail.com', '202cb962ac59075b964b07152d234b70', '(28) 88754-6831', 'X1Q3G3', 'imagemPadrao.png', 1, '2023-07-10 03:41:06'),
(33, '144.165.793-18', 'Zenaida Johnson', 'Reed', 'zenaidajohnson6740@gmail.com', '202cb962ac59075b964b07152d234b70', '(78) 75658-8214', 'U7T5L4', 'imagemPadrao.png', 1, '2023-05-30 20:36:29'),
(34, '728.157.045-54', 'Brandon Gutierrez', 'Newton', 'brandongutierrez@gmail.com', '202cb962ac59075b964b07152d234b70', '(78) 63408-8723', 'J5J5R5', 'imagemPadrao.png', 1, '2023-01-15 15:00:45'),
(38, '716.305.406-81', 'Nina Daugherty', 'Reid', 'ninadaugherty@gmail.com', '202cb962ac59075b964b07152d234b70', '(18) 89584-6754', 'W1Z0L0', 'imagemPadrao.png', 1, '2022-03-24 10:12:39'),
(39, '384.213.403-64', 'Zephania Sears', 'Wynn', 'zephaniasears2346@gmail.com', '202cb962ac59075b964b07152d234b70', '(55) 47714-4229', 'L1V7N2', 'imagemPadrao.png', 1, '2022-10-14 23:32:23'),
(40, '148.437.157-38', 'Macy Hicks', 'Benton', 'macyhicks@gmail.com', '202cb962ac59075b964b07152d234b70', '(02) 85416-8775', 'U2S8Q7', 'imagemPadrao.png', 1, '2022-07-10 12:56:24'),
(41, '431.956.133-11', 'Jennifer Carter', 'Santana', 'jennifercarter5042@gmail.com', '202cb962ac59075b964b07152d234b70', '(47) 96144-7469', 'C2M7T4', 'imagemPadrao.png', 1, '2023-10-24 05:20:12'),
(42, '156.464.541-45', 'Reese Strong', 'Vincent', 'reesestrong1387@gmail.com', '202cb962ac59075b964b07152d234b70', '(75) 24767-7632', 'W4B2O1', 'imagemPadrao.png', 1, '2023-03-01 14:11:53'),
(43, '377.735.822-48', 'Hiram Avery', 'Huff', 'hiramavery6816@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 12818-3362', 'K5K2B5', 'imagemPadrao.png', 1, '2022-09-05 12:37:44'),
(46, '446.613.507-67', 'Ross Smith', 'Nixon', 'rosssmith4461@gmail.com', '202cb962ac59075b964b07152d234b70', '(72) 83798-2807', 'Z3P1H2', 'imagemPadrao.png', 1, '2023-05-21 03:49:43'),
(47, '918.168.151-55', 'Guy Cleveland', 'Lowery', 'guycleveland215@gmail.com', '202cb962ac59075b964b07152d234b70', '(74) 32241-2478', 'F5B4W7', 'imagemPadrao.png', 1, '2023-06-10 10:55:15'),
(49, '140.444.326-27', 'Rinah Skinner', 'Johnston', 'rinahskinner@gmail.com', '202cb962ac59075b964b07152d234b70', '(78) 47583-8512', 'R6E4M1', 'imagemPadrao.png', 1, '2023-09-12 21:04:04'),
(50, '031.451.348-68', 'Samson Gates', 'Anthony', 'samsongates9038@gmail.com', '202cb962ac59075b964b07152d234b70', '(99) 05482-7291', 'B2G1T7', 'imagemPadrao.png', 1, '2022-07-03 22:29:30'),
(51, '656.346.346-34', 'Rafael Pereira', 'raffaps', '0000731019@senaimgaluno.com.br', '202cb962ac59075b964b07152d234b70', '(32) 95354-5345', '6575', 'imagemPadrao.png', 1, '2023-03-30 21:44:34'),
(52, '67.967.969/6967-96', 'Luiz Cesar', 'LCSouza', 'luizcesar@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '(32) 97735-4345', '1379', 'imagemPadrao.png', 1, '2023-04-04 09:21:20'),
(53, '55.435.235/2352-35', 'Ana Julia', 'Ana Ju', 'anajuliaalmeida@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 98465-4353', '2754', 'perfilKoala53clientes.png', 1, '2023-04-04 09:29:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motoboy`
--

CREATE TABLE `motoboy` (
  `id_motoboy` int(11) NOT NULL,
  `cpf_motoboy` varchar(20) NOT NULL,
  `nome_motoboy` varchar(200) NOT NULL,
  `email_motoboy` varchar(100) NOT NULL,
  `senha_motoboy` varchar(50) NOT NULL,
  `telefone_motoboy` varchar(100) NOT NULL,
  `placa_moto` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'imagemPadrao.png',
  `cod_verificacao` varchar(7) NOT NULL,
  `status` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `motoboy`
--

INSERT INTO `motoboy` (`id_motoboy`, `cpf_motoboy`, `nome_motoboy`, `email_motoboy`, `senha_motoboy`, `telefone_motoboy`, `placa_moto`, `foto`, `cod_verificacao`, `status`) VALUES
(1, '440.755.157-61', 'Farrah Albert', 'farrahalbert9026@gmail.com', '202cb962ac59075b964b07152d234b70', '(18) 79353-1718', 'URP51TSC4QG', 'imagemPadrao.png', 'Q1R5C8', '1'),
(2, '413.882.604-60', 'Anne Tucker Deimons', 'annetucker@gmail.com', '202cb962ac59075b964b07152d234b70', '(41) 82255-4565', 'GOW50GCG3JN', 'perfilpessoa2motoboy.png', 'M9P1L1', '1'),
(3, '168.028.837-41', 'Elton Harrison', 'eltonharrison@gmail.com', '202cb962ac59075b964b07152d234b70', '(75) 14054-1205', 'HCS28GJB3HR', 'imagemPadrao.png', 'N5M9S9', '1'),
(4, '713.641.684-26', 'Reese Mendez', 'reesemendez9287@gmail.com', '202cb962ac59075b964b07152d234b70', '(42) 20774-0338', 'KRS74EEG4XT', 'imagemPadrao.png', 'W0Q1C0', '1'),
(5, '244.289.482-26', 'Mariko Tillman', 'marikotillman5347@gmail.com', '202cb962ac59075b964b07152d234b70', '(11) 77384-2435', 'EVF84FRV7YC', 'imagemPadrao.png', 'V5S6E7', '1'),
(6, '667.583.928-39', 'Colleen Mcneil', 'colleenmcneil3127@gmail.com', '202cb962ac59075b964b07152d234b70', '(37) 10071-7235', 'LOA40WYF1DI', 'imagemPadrao.png', 'N5A2K3', '1'),
(7, '728.943.445-46', 'Iris Walls', 'iriswalls@gmail.com', '202cb962ac59075b964b07152d234b70', '(58) 62276-5315', 'RXV81AIV4HL', 'imagemPadrao.png', 'S5W7Q8', '1'),
(9, '219.536.466-42', 'Chase Cunningham', 'chasecunningham@gmail.com', '202cb962ac59075b964b07152d234b70', '(82) 55482-4143', 'YEX62EYF4LL', 'imagemPadrao.png', 'T7L3R1', '1'),
(10, '281.780.621-77', 'Holmes Scott', 'holmesscott6548@gmail.com', '202cb962ac59075b964b07152d234b70', '(35) 26520-2543', 'PWH45FYK3WW', 'imagemPadrao.png', 'U6R4V8', '1'),
(11, '254.580.515-21', 'Inga Wolf', 'ingawolf@gmail.com', '202cb962ac59075b964b07152d234b70', '(51) 36525-6818', 'FNS57XCQ3TO', 'imagemPadrao.png', 'H9G7K1', '1'),
(12, '353.196.235-72', 'Tamara Roy', 'tamararoy@gmail.com', '202cb962ac59075b964b07152d234b70', '(86) 79370-7485', 'HOR92ADC2YA', 'imagemPadrao.png', 'O4C4I6', '1'),
(13, '693.825.231-62', 'Belle Briggs', 'bellebriggs@gmail.com', '202cb962ac59075b964b07152d234b70', '(18) 88823-6672', 'XNQ18FWN4FZ', 'imagemPadrao.png', 'S7T5E6', '1'),
(14, '920.403.856-46', 'Alfonso Lynn', 'alfonsolynn@gmail.com', '202cb962ac59075b964b07152d234b70', '(16) 85270-7155', 'KBB58SIU0UL', 'imagemPadrao.png', 'M8E6N3', '1'),
(15, '294.743.627-55', 'Medge Beasley', 'medgebeasley@gmail.com', '202cb962ac59075b964b07152d234b70', '(54) 04116-9237', 'GPP74GRN5MA', 'imagemPadrao.png', 'K3F5G6', '1'),
(16, '464.163.766-44', 'Audra Leonard', 'audraleonard5676@gmail.com', '202cb962ac59075b964b07152d234b70', '(65) 05321-6075', 'IRV82HDJ1EL', 'imagemPadrao.png', 'B3L2P1', '1'),
(17, '843.036.338-51', 'Emmanuel Keith', 'emmanuelkeith@gmail.com', '202cb962ac59075b964b07152d234b70', '(67) 82313-4811', 'VKC68VXC5IL', 'imagemPadrao.png', 'G6S8K6', '1'),
(18, '575.644.629-06', 'Hammett Rivas', 'hammettrivas@gmail.com', '202cb962ac59075b964b07152d234b70', '(45) 42524-1277', 'TYH74ITG3RT', 'imagemPadrao.png', 'S7Q1Y5', '1'),
(19, '335.569.832-98', 'Emerson Watts', 'emersonwatts5389@gmail.com', '202cb962ac59075b964b07152d234b70', '(62) 55867-4781', 'LLE53JQI3LG', 'imagemPadrao.png', 'Q8A6X4', '1'),
(20, '207.232.992-38', 'Halee Sandoval', 'haleesandoval@gmail.com', '202cb962ac59075b964b07152d234b70', '(21) 52363-7873', 'MUK56PQU8WM', 'imagemPadrao.png', 'Q5Y0Q3', '1'),
(21, '821.726.833-86', 'Timon Mcbride', 'timonmcbride1821@gmail.com', '202cb962ac59075b964b07152d234b70', '(82) 14195-9634', 'NTV21LDG8ZP', 'imagemPadrao.png', 'H0H2H2', '1'),
(22, '864.862.785-14', 'Vaughan Owens', 'vaughanowens447@gmail.com', '202cb962ac59075b964b07152d234b70', '(25) 77134-4847', 'CUZ65CZX5LI', 'imagemPadrao.png', 'O6F0X2', '1'),
(23, '368.157.425-67', 'Theodore Leach', 'theodoreleach6486@gmail.com', '202cb962ac59075b964b07152d234b70', '(86) 46312-2722', 'WHF14ZRG3HB', 'imagemPadrao.png', 'I4M4E1', '1'),
(24, '874.172.205-17', 'George Velez', 'georgevelez5472@gmail.com', '202cb962ac59075b964b07152d234b70', '(69) 16228-1206', 'GCX31JEV7PF', 'imagemPadrao.png', 'X3J5X1', '1'),
(25, '613.823.327-43', 'Martena Campos', 'martenacampos5781@gmail.com', '202cb962ac59075b964b07152d234b70', '(53) 30916-2293', 'SDC48BVQ4XC', 'imagemPadrao.png', 'R0Y7C6', '1'),
(26, '385.731.315-80', 'Aretha Nguyen', 'arethanguyen9842@gmail.com', '202cb962ac59075b964b07152d234b70', '(11) 72425-8144', 'QXP51VHD4PY', 'imagemPadrao.png', 'L8W8O4', '1'),
(27, '381.853.717-51', 'Octavius Carroll', 'octaviuscarroll@gmail.com', '202cb962ac59075b964b07152d234b70', '(51) 75233-2877', 'WED36GVD7SS', 'imagemPadrao.png', 'B5N7S7', '1'),
(29, '890.500.818-45', 'Rooney Reilly', 'rooneyreilly2517@gmail.com', '202cb962ac59075b964b07152d234b70', '(03) 37044-6049', 'PSO55YJR6MN', 'imagemPadrao.png', 'S6O0U8', '1'),
(30, '084.211.832-00', 'Kamal Griffin', 'kamalgriffin@gmail.com', '202cb962ac59075b964b07152d234b70', '(39) 88895-2749', 'THA88OID8CY', 'imagemPadrao.png', 'U0Q6H4', '1'),
(31, '555.581.611-25', 'Willa Sargent', 'willasargent@gmail.com', '202cb962ac59075b964b07152d234b70', '(47) 16992-8514', 'CFH07XKE1LU', 'imagemPadrao.png', 'P3D1H6', '1'),
(32, '664.197.152-47', 'Deirdre Stone', 'deirdrestone@gmail.com', '202cb962ac59075b964b07152d234b70', '(04) 67306-1525', 'BDG81HLJ8OC', 'imagemPadrao.png', 'D4J4J8', '1'),
(33, '128.066.875-06', 'Arthur Howell', 'arthurhowell2935@gmail.com', '202cb962ac59075b964b07152d234b70', '(00) 25938-6608', 'VZC75XTK7UN', 'imagemPadrao.png', 'Q4X3V7', '1'),
(34, '312.835.158-34', 'Barclay Oneil', 'barclayoneil@gmail.com', '202cb962ac59075b964b07152d234b70', '(59) 86331-0865', 'BTO66EBR7RV', 'imagemPadrao.png', 'D4S2S2', '1'),
(35, '345.285.447-42', 'Aladdin Knox', 'aladdinknox9317@gmail.com', '202cb962ac59075b964b07152d234b70', '(11) 97521-5303', 'ZOL41QYV7FU', 'imagemPadrao.png', 'X5P6T1', '1'),
(36, '807.208.907-66', 'Kelly Gallagher', 'kellygallagher@gmail.com', '202cb962ac59075b964b07152d234b70', '(14) 24684-5643', 'RSB94QRD2XU', 'imagemPadrao.png', 'C2T4C3', '1'),
(37, '046.345.872-67', 'Rae Bernard', 'raebernard8913@gmail.com', '202cb962ac59075b964b07152d234b70', '(58) 64746-4858', 'LHF31SUU6EN', 'imagemPadrao.png', 'T3W4O5', '1'),
(38, '158.725.276-63', 'Orli Delgado', 'orlidelgado@gmail.com', '202cb962ac59075b964b07152d234b70', '(96) 48813-6430', 'NXI13KMT1OJ', 'imagemPadrao.png', 'K2I7L6', '1'),
(39, '542.743.271-57', 'Gabriel Orr', 'gabrielorr2550@gmail.com', '202cb962ac59075b964b07152d234b70', '(82) 11642-9439', 'OHI27KRG7WD', 'imagemPadrao.png', 'B1Q2E6', '1'),
(40, '742.644.607-31', 'Randall Strickland', 'randallstrickland@gmail.com', '202cb962ac59075b964b07152d234b70', '(45) 41110-8583', 'SJV83ZQS3TV', 'imagemPadrao.png', 'H4O6W1', '1'),
(41, '658.621.911-83', 'Ruby Gordon', 'rubygordon@gmail.com', '202cb962ac59075b964b07152d234b70', '(57) 76341-3821', 'SKH32HAM1PN', 'imagemPadrao.png', 'B8V8Y1', '1'),
(42, '126.597.136-44', 'Lucy Aguirre', 'lucyaguirre@gmail.com', '202cb962ac59075b964b07152d234b70', '(57) 49158-7450', 'ERQ31DIN5JF', 'imagemPadrao.png', 'D3N7B5', '1'),
(43, '122.173.845-86', 'Scarlet Stone', 'scarletstone1246@gmail.com', '202cb962ac59075b964b07152d234b70', '(95) 71846-8530', 'QXB15RZN5OR', 'imagemPadrao.png', 'Q0M5T4', '1'),
(44, '565.683.067-22', 'Hermione Flowers', 'hermioneflowers@gmail.com', '202cb962ac59075b964b07152d234b70', '(16) 85751-4213', 'ITR55SPR4KJ', 'imagemPadrao.png', 'Q6W5G6', '1'),
(45, '208.367.415-74', 'Xandra Ross', 'xandraross@gmail.com', '202cb962ac59075b964b07152d234b70', '(43) 15398-3229', 'FYK79QXT4KE', 'imagemPadrao.png', 'P4B6B4', '1'),
(46, '351.502.328-83', 'Nell Garner', 'nellgarner@gmail.com', '202cb962ac59075b964b07152d234b70', '(93) 28561-8545', 'SOQ18JCJ8MW', 'imagemPadrao.png', 'E5S3Y5', '1'),
(47, '576.247.544-48', 'Riley Price', 'rileyprice@gmail.com', '202cb962ac59075b964b07152d234b70', '(33) 00125-2316', 'DSX57XGW7EN', 'imagemPadrao.png', 'W8R8Y1', '1'),
(48, '015.774.183-11', 'Kevyn Morton', 'kevynmorton@gmail.com', '202cb962ac59075b964b07152d234b70', '(95) 23666-9811', 'OBC82EJI8YE', 'imagemPadrao.png', 'X9J6K8', '1'),
(49, '473.227.396-75', 'Trevor Luna', 'trevorluna5400@gmail.com', '202cb962ac59075b964b07152d234b70', '(45) 89924-7764', 'PFE32FUE8SF', 'imagemPadrao.png', 'L7C5Q2', '1'),
(50, '662.599.021-52', 'Colby Solis', 'colbysolis@gmail.com', '202cb962ac59075b964b07152d234b70', '(23) 51327-4142', 'DIU65PJH9PE', 'imagemPadrao.png', 'O6N3A4', '1'),
(108, '615.156.151-65', 'Pedro Cesar', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 98760-8766', 'Rgi8i67', 'imagemPadrao.png', '6F070C', '1'),
(109, '767.567.567-56', 'Pedro Cesar', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 96345-3454', 'Rgi8i67', 'imagemPadrao.png', '44D7C8', '1'),
(110, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '6037', '1'),
(111, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '5508', '1'),
(112, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '9398', '1'),
(113, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '4114', '1'),
(114, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '6871', '1'),
(115, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '9315', '1'),
(116, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '6379', '1'),
(117, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '3724', '1'),
(118, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '5264', '1'),
(119, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '9220', '1'),
(120, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '9284', '1'),
(121, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '7381', '1'),
(122, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '3273', '1'),
(123, '263.143.123-51', 'Rafael Pereira', 'rafaelps.13.p@gmail.com', '202cb962ac59075b964b07152d234b70', '(32) 91613-2151', 'ADAF1315A', 'imagemPadrao.png', '4648', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id_servicos` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `cod_motoboy` int(11) DEFAULT NULL,
  `cep_retirada` text NOT NULL,
  `endereco_retirada` text NOT NULL,
  `cep_destino` text NOT NULL,
  `endereco_destino` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 2,
  `tempo` float NOT NULL,
  `distancia` float NOT NULL,
  `horario_retirada` time DEFAULT NULL,
  `horario_previsto` time DEFAULT NULL,
  `horario_chegada` time DEFAULT NULL,
  `valor_peso` float DEFAULT NULL,
  `valor_distancia` float DEFAULT NULL,
  `valor_tempo` float DEFAULT NULL,
  `valor_frete` float DEFAULT NULL,
  `statusPagamento` tinyint(1) NOT NULL,
  `data_criacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id_servicos`, `cod_cliente`, `cod_motoboy`, `cep_retirada`, `endereco_retirada`, `cep_destino`, `endereco_destino`, `status`, `tempo`, `distancia`, `horario_retirada`, `horario_previsto`, `horario_chegada`, `valor_peso`, `valor_distancia`, `valor_tempo`, `valor_frete`, `statusPagamento`, `data_criacao`) VALUES
(0, 51, 2, '36052-100', 'Rua São Pancrácio, 650 - São Tarcísio, Juiz de Fora - MG, 36052-100', '36035-000', 'Avenida Barão do Rio Branco, 1219 - Centro, Juiz de Fora - MG, 36035-000', 0, 8.75, 2.74, '02:18:43', '02:27:43', '03:48:35', 3, 1.37, 2.63, 7, 1, '2023-03-15'),
(1, 51, 2, '36052-100', 'Rua São Pancrácio, 650 - São Tarcísio, Juiz de Fora - MG, 36052-100', '36035-000', 'Avenida Barão do Rio Branco, 1219 - Centro, Juiz de Fora - MG, 36035-000', 0, 8.6, 2.7, '05:23:58', '05:32:58', '05:24:08', 5, 1.35, 2.58, 8.93, 1, '2023-03-29'),
(2, 51, 2, '36052-100', 'Rua São Pancrácio, 650 - São Tarcísio, Juiz de Fora - MG, 36052-100', '36035-000', 'Avenida Barão do Rio Branco, 1219 - Centro, Juiz de Fora - MG, 36035-000', 0, 8.6, 2.7, '05:39:15', '05:48:15', '05:41:32', 5, 1.35, 2.58, 8.93, 1, '2023-03-29'),
(3, 53, 2, '36052-100', 'Rua São Pancrácio, 650 - São Tarcísio, Juiz de Fora - MG, 36052-100', '36035-000', 'Avenida Barão do Rio Branco, 1219 - Centro, Juiz de Fora - MG, 36035-000', 0, 8.6, 2.7, '09:22:40', '09:31:40', '09:22:43', 5, 1.35, 2.58, 8.93, 1, '2023-03-30'),
(5, 53, 2, '36052-100', 'Rua São Pancrácio, 650 - São Tarcísio, Juiz de Fora - MG, 36052-100', '36035-000', 'Avenida Barão do Rio Branco, 1219 - Centro, Juiz de Fora - MG, 36035-000', 0, 8.6, 2.7, '11:24:06', '11:33:06', '11:24:07', 5, 1.35, 2.58, 8.93, 1, '2023-03-30'),
(6, 3, 2, '36025-290', 'Avenida Presidente Itamar Franco, 3600 - São Mateus, Juiz de Fora - MG, 36025-290', '36080-060', 'Avenida Brasil, 6345 - Mariano Procópio, Juiz de Fora - MG, 36080-060', 0, 17.72, 7.65, '11:24:12', '11:42:12', '11:24:15', 5, 3.82, 5.32, 14.14, 1, '2023-03-30'),
(7, 23, 27, '01001-000', 'Praça da Sé, s/n - Sé, São Paulo - SP, 01001-000', '04538-132', 'Rua Nova York, 179 - Brooklin, São Paulo - SP, 04538-132', 0, 14.5, 5.7, '08:30:00', '10:00:00', '10:45:00', 12.7, 9.2, 6.5, 28.4, 1, '2023-01-05'),
(8, 7, 12, '58000-000', 'Rua das Flores, 100 - Centro, João Pessoa - PB, 58000-000', '50000-000', 'Avenida Boa Viagem, 1000 - Boa Viagem, Recife - PE, 50000-000', 0, 17.2, 8.3, '11:15:00', '12:30:00', '13:15:00', 19.3, 5.6, 7.1, 32, 1, '2023-01-08'),
(9, 2, 40, '70770-000', 'SGAN 601, Módulo K, Brasília - DF, 70770-000', '60870-000', 'Avenida Washington Soares, 1000 - Edson Queiroz, Fortaleza - CE, 60870-000', 0, 8.7, 3.5, '13:20:00', '14:30:00', '15:00:00', 16.8, 10.5, 4.7, 31.9, 1, '2023-01-11'),
(10, 32, 17, '40000-000', 'Praça Municipal, s/n - Centro, Salvador - BA, 40000-000', '50070-210', 'Rua Carlos Gomes, 100 - Centro, Aracaju - SE, 50070-210', 0, 10.3, 2.1, '09:45:00', '11:00:00', '11:45:00', 13.6, 8.3, 2.2, 24.1, 1, '2023-01-14'),
(11, 13, 45, '04787-060', 'Rua Senador José Ermírio de Moraes, 383 - Campo Grande, São Paulo - SP, 04787-060', '04081-002', 'Rua Capitão Macedo, 207 - Vila Mariana, São Paulo - SP, 04081-002', 0, 14.5, 7.6, '11:35:00', '12:20:00', '12:40:00', 20.4, 10.1, 4.6, 35.1, 1, '2023-08-08'),
(12, 43, 30, '04236-120', 'Rua Jaboticabal, 43 - Vila Liviero, São Paulo - SP, 04236-120', '04074-010', 'Rua Cubatão, 965 - Vila Mariana, São Paulo - SP, 04074-010', 0, 12.8, 5.9, '08:55:00', '09:50:00', '10:10:00', 10.2, 6.7, 2.5, 19.4, 1, '2023-02-10'),
(13, 51, 31, '04856-630', 'Rua João Elias Saad, 82 - Jardim Campo Grande, São Paulo - SP, 04856-630', '04661-003', 'Rua Camanducaia, 82 - Chácara Flora, São Paulo - SP, 04661-003', 0, 19.2, 9.8, '09:45:00', '10:35:00', '10:50:00', 18.6, 12.5, 6.1, 37.2, 1, '2023-10-21'),
(14, 48, 9, '03323-000', 'Rua Professor Pedreira de Freitas, 707 - Vila Guilherme, São Paulo - SP, 03323-000', '04204-000', 'Rua do Manifesto, 2777 - Ipiranga, São Paulo - SP, 04204-000', 0, 20.1, 8.4, '17:00:00', '18:10:00', '18:30:00', 16.8, 8.9, 6.4, 32.1, 1, '2023-09-17'),
(15, 8, 5, '03122-020', 'Rua Agostinho de Carvalho, 241 - Silveira, Belo Horizonte - MG, 03122-020', '05317-020', 'Rua dos Pinheiros, 256 - Pinheiros, São Paulo - SP, 05317-020', 0, 17.2, 8.7, '10:30:00', '12:30:00', '13:00:00', 16.4, 8.1, 4.2, 28.7, 1, '2023-08-11'),
(16, 12, 21, '77814-025', 'Rua X, 123 - Setor Central, Araguaína - TO, 77814-025', '60175-045', 'Rua Padre Valdevino, 2000 - Aldeota, Fortaleza - CE, 60175-045', 0, 18.4, 4.1, '09:15:00', '10:45:00', '11:30:00', 19.6, 5.7, 6.1, 31.4, 1, '2023-05-29'),
(17, 3, 17, '30662-450', 'Rua Luiz Gomes, 154 - Jardim Leblon, Belo Horizonte - MG, 30662-450', '78068-605', 'Rua das Bocaiúvas, 195 - Jardim Itália, Cuiabá - MT, 78068-605', 0, 12.5, 3.6, '13:30:00', '14:45:00', '15:10:00', 22.3, 10.2, 1.7, 34.2, 1, '2023-09-19'),
(18, 36, 43, '08275-250', 'Rua Caravela Santa Maria, 44 - Parque Santa Madalena, São Paulo - SP, 08275-250', '20520-050', 'Rua Belisário Távora, 425 - Tijuca, Rio de Janeiro - RJ, 20520-050', 0, 20.1, 9.3, '14:00:00', '16:00:00', '16:30:00', 22.5, 11.4, 5.9, 39.8, 1, '2023-10-03'),
(19, 0, 0, '25015-070', 'Rua Marquês de Abrantes, 12 - Flamengo, Rio de Janeiro - RJ, 25015-070', '04103-080', 'Rua Jaborandi, 120 - Saúde, São Paulo - SP, 04103-080', 0, 19.5, 7.8, '14:15:00', '16:30:00', '17:10:00', 11.2, 10.6, 4.7, 26.5, 1, '2023-07-12'),
(20, 9, 27, '03121-050', 'Rua dos Alpes, 75 - Mooca, São Paulo - SP, 03121-050', '13020-014', 'Rua Major Sertório, 54 - Centro, Campinas - SP, 13020-014', 0, 10.8, 6.5, '10:30:00', '11:45:00', '12:20:00', 20.3, 8.9, 6.7, 35.9, 1, '2023-09-07'),
(21, 10, 5, '07075-110', 'Rua Antônio de Barros Júnior, 23 - Vila Progresso, Guarulhos - SP, 07075-110', '80230-090', 'Rua São Salvador, 85 - Centro, Curitiba - PR, 80230-090', 0, 8.6, 9.9, '13:45:00', '14:50:00', '15:25:00', 21.4, 14.2, 1.9, 37.5, 1, '2023-05-11'),
(22, 34, 9, '13920-000', 'Rua dos Bobos, 0 - Centro, Pedra Bela - SP, 13920-000', '04543-100', 'Rua A, 123 - Vila Olímpia, São Paulo - SP, 04543-100', 0, 11.5, 5.8, '13:24:17', '14:53:21', '16:15:34', 14.5, 8.2, 2.7, 25.4, 1, '2023-02-23'),
(23, 10, 29, '49020-220', 'Rua E, 44 - Getúlio Vargas, Aracaju - SE, 49020-220', '18010-230', 'Rua F, 88 - Vila Jardini, Sorocaba - SP, 18010-230', 0, 19.4, 6.5, '08:15:22', '10:01:59', '11:32:11', 11.7, 6.1, 7.2, 25, 1, '2023-08-14'),
(24, 33, 6, '88301-000', 'Rua Santo Antônio, 100 - Centro, Itajaí - SC, 88301-000', '30350-542', 'Rua X, 200 - Sion, Belo Horizonte - MG, 30350-542', 0, 13.7, 2.4, '18:42:36', '20:04:55', '21:30:03', 12.6, 4.3, 6.8, 23.7, 1, '2023-05-06'),
(25, 18, 16, '22210-010', 'Rua Senador Vergueiro, 23 - Flamengo, Rio de Janeiro - RJ, 22210-010', '50020-080', 'Rua B, 15 - Espinheiro, Recife - PE, 50020-080', 0, 14.8, 8.1, '08:27:19', '10:12:37', '11:41:59', 22.2, 7.5, 6.1, 36.8, 1, '2023-01-17'),
(26, 45, 31, '02050-001', 'Rua Alfredo Pujol, 123 - Santana, São Paulo - SP, 02050-001', '09070-560', 'Rua Joaquim Nabuco, 289 - Campestre, Santo André - SP, 09070-560', 0, 16.3, 5.8, '15:45:00', '17:00:00', '17:45:00', 12.7, 9.3, 7.1, 29.1, 1, '2023-09-15'),
(27, 32, 9, '64049-150', 'Rua Alziro Viana, 456 - Jóquei, Teresina - PI, 64049-150', '64050-055', 'Rua Paulo de Tarso, 233 - Monte Castelo, Teresina - PI, 64050-055', 0, 10.1, 3.2, '12:30:00', '13:45:00', '14:15:00', 9.2, 6.5, 2.8, 18.5, 1, '2023-09-17'),
(28, 14, 40, '30330-350', 'Rua Conselheiro Lafaiete, 123 - Prado, Belo Horizonte - MG, 30330-350', '30150-560', 'Rua dos Guajajaras, 456 - Centro, Belo Horizonte - MG, 30150-560', 0, 8.2, 2.7, '10:15:00', '11:30:00', '12:00:00', 18.6, 5.7, 6.1, 30.4, 1, '2023-09-19'),
(29, 37, 28, '69905-640', 'Rua Rio Grande do Sul, 123 - Seis de Agosto, Rio Branco - AC, 69905-640', '69915-622', 'Rua Francisco Mangabeira, 456 - Distrito Industrial, Rio Branco - AC, 69915-622', 0, 6.4, 1.5, '08:30:00', '09:45:00', '10:15:00', 21.2, 8.9, 5.2, 35.3, 1, '2023-09-20'),
(30, 32, 3, '69308-205', 'Rua Pau Brasil, 65 - Tancredo Neves, Boa Vista - RR, 69308-205', '29164-441', 'Rua Itabira, 55 - Rio Marinho, Serra - ES, 29164-441', 0, 15.75, 8.97, '10:32:00', '12:47:00', '13:31:00', 17.75, 8.46, 2.57, 28.78, 1, '2023-04-05'),
(31, 37, 29, '78550-000', 'Rua Juruena, 680 - Centro, Juara - MT, 78550-000', '58013-120', 'Rua Ana de Oliveira Maranhão, 99 - Miramar, João Pessoa - PB, 58013-120', 0, 10.28, 9.87, '09:53:00', '11:49:00', '12:22:00', 21.88, 7.13, 6.78, 35.79, 1, '2023-04-06'),
(32, 49, 24, '11707-200', 'Rua da Bica, 341 - Canto do Forte, Praia Grande - SP, 11707-200', '59072-535', 'Rua dos Olhos D\'água, 615 - Capim Macio, Natal - RN, 59072-535', 0, 8.47, 6.39, '14:12:00', '16:35:00', '17:23:00', 21.52, 12.13, 3.25, 36.9, 1, '2023-04-06'),
(33, 15, 1, '05874-220', 'Rua Serra do Arapuá, 31 - Jardim Valo Velho, São Paulo - SP, 05874-220', '88813-210', 'Rua Ricardo de Oliveira, 465 - Urussanguinha, Criciúma - SC, 88813-210', 0, 10.98, 7.18, '14:27:00', '16:36:00', '17:25:00', 9.24, 13.34, 3.2, 25.78, 1, '2023-04-07'),
(34, 53, 2, '36052-100', 'Rua São Pancrácio, 650 - São Tarcísio, Juiz de Fora - MG, 36052-100', '36035-000', 'Avenida Barão do Rio Branco, 1219 - Centro, Juiz de Fora - MG, 36035-000', 0, 8.6, 2.7, '08:46:42', '08:55:42', '08:46:54', 5, 1.35, 2.58, 8.93, 1, '2023-03-30'),
(35, 51, 2, '36052-100', 'Rua São Pancrácio, 650 - São Tarcísio, Juiz de Fora - MG, 36052-100', '36035-000', 'Avenida Barão do Rio Branco, 1219 - Centro, Juiz de Fora - MG, 36035-000', 0, 8.6, 2.7, '08:47:02', '08:56:02', '08:47:11', 5, 1.35, 2.58, 8.93, 1, '2023-04-04'),
(36, 51, NULL, '36052-100', 'Rua São Pancrácio, 650 - São Tarcísio, Juiz de Fora - MG, 36052-100', '36035-000', 'Avenida Barão do Rio Branco, 1219 - Centro, Juiz de Fora - MG, 36035-000', 2, 8.6, 2.7, NULL, NULL, NULL, 9, 1.35, 2.58, 12.93, 1, '2023-04-04'),
(37, 32, NULL, '36045-475', 'Avenida Brasil, 5300 - Santa Terezinha, Juiz de Fora - MG, 36045-475', '36035-350', 'Rua Antônio Fellet, 777 - Vale do Ipê, Juiz de Fora - MG, 36035-350', 2, 8, 2.62, NULL, NULL, NULL, 9, 1.31, 2.4, 12.71, 1, '2023-04-04'),
(38, 39, NULL, '36015-510', 'Avenida Barão do Rio Branco, 2000 - Centro, Juiz de Fora - MG, 36015-510', '36061-170', 'Rua Caxambu, 39 - São Benedito, Juiz de Fora - MG, 36061-170', 2, 14.22, 4.48, NULL, NULL, NULL, 9, 2.24, 4.27, 15.51, 1, '2023-04-04'),
(39, 8, NULL, '36047-000', 'Rua José Libânio Rodrigues, 789 - Bandeirantes, Juiz de Fora - MG, 36047-000', '36033-000', 'Avenida Deusdedith Salgado, 1690 - Teixeiras, Juiz de Fora - MG, 36033-000', 2, 25.25, 10.23, NULL, NULL, NULL, 12, 5.12, 7.58, 24.69, 1, '2023-04-04'),
(40, 52, NULL, '36061-220', 'Rua José Zacarias dos Santos, 177 - São Benedito, Juiz de Fora - MG, 36061-220', '36035-780', 'Rua Mariano Procópio, 1100 - Centro, Juiz de Fora - MG, 36035-780', 2, 11.7, 3.75, NULL, NULL, NULL, 12, 1.88, 3.51, 17.39, 1, '2023-04-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `p_p` varchar(255) DEFAULT 'user-default.png',
  `last_seen` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `p_p`, `last_seen`) VALUES
(1, 'Rafael', 'Raffa', '$2y$10$lwXO8raLEfMmnDzFQHwCMOsNPU6gW.jfO8kLgqQFkd33L0QHo6L7K', 'Raffa.png', '2023-03-22 02:34:23'),
(2, 'Pedro', 'Pedro', '$2y$10$vthPxGb76.vUHtWIoMRUCOzVANn7F5bU8TwqcZUQ.8dh8n8MqEW2u', 'Pedro.png', '2023-03-22 02:34:26'),
(3, 'Rafael', 'rafa', '$2y$10$Z5qDI1zQhrKbmkJ2BMuB9O2DClgrjfb25MoRgYzE4xpeWDJ.pEtI6', 'rafa.jpg', '2023-03-22 09:32:32'),
(4, 'RafaelPS', 'rainha', '$2y$10$lu/N7mK3dF5ixQPk0e9zqezqZE8wWzN6oteb0qI861upP.deepSh.', 'user-default.png', '2023-03-22 09:36:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `verificacoes`
--

CREATE TABLE `verificacoes` (
  `id_verificacoes` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `id_cliente_motoboy` int(11) NOT NULL,
  `tipo_cliente_motoboy` varchar(15) NOT NULL,
  `data` datetime NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Índices para tabela `cartoes`
--
ALTER TABLE `cartoes`
  ADD PRIMARY KEY (`id_cartao`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `motoboy`
--
ALTER TABLE `motoboy`
  ADD PRIMARY KEY (`id_motoboy`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id_servicos`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cartoes`
--
ALTER TABLE `cartoes`
  MODIFY `id_cartao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `motoboy`
--
ALTER TABLE `motoboy`
  MODIFY `id_motoboy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id_servicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
