--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: categoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categoria (
    cate_codigo integer NOT NULL,
    cate_nome character varying(60) NOT NULL
);


ALTER TABLE categoria OWNER TO postgres;

--
-- Name: categoria_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE categoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE categoria_seq OWNER TO postgres;

--
-- Name: categoria_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE categoria_seq OWNED BY categoria.cate_codigo;


--
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cliente (
    clien_codigo integer NOT NULL,
    clien_nome character varying(120) NOT NULL,
    clien_tipo smallint NOT NULL,
    clien_cpf_cnpj character varying(14) NOT NULL,
    clien_email character varying(100) NOT NULL,
    muni_codigo integer NOT NULL
);


ALTER TABLE cliente OWNER TO postgres;

--
-- Name: cliente_clien_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cliente_clien_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cliente_clien_seq OWNER TO postgres;

--
-- Name: cliente_clien_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cliente_clien_seq OWNED BY cliente.clien_codigo;


--
-- Name: estado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estado (
    esta_codigo integer NOT NULL,
    esta_nome character varying(60) NOT NULL
);


ALTER TABLE estado OWNER TO postgres;

--
-- Name: estado_esta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE estado_esta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE estado_esta_seq OWNER TO postgres;

--
-- Name: estado_esta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE estado_esta_seq OWNED BY estado.esta_codigo;


--
-- Name: fabricante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE fabricante (
    fabr_codigo integer NOT NULL,
    fabr_nome character varying(60) NOT NULL
);


ALTER TABLE fabricante OWNER TO postgres;

--
-- Name: fabricante_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE fabricante_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE fabricante_seq OWNER TO postgres;

--
-- Name: fabricante_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE fabricante_seq OWNED BY fabricante.fabr_codigo;


--
-- Name: forma_pagamento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE forma_pagamento (
    fopa_codigo integer NOT NULL,
    fopa_nome character varying(60) NOT NULL
);


ALTER TABLE forma_pagamento OWNER TO postgres;

--
-- Name: forma_pagamento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE forma_pagamento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE forma_pagamento_seq OWNER TO postgres;

--
-- Name: forma_pagamento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE forma_pagamento_seq OWNED BY forma_pagamento.fopa_codigo;


--
-- Name: municipio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE municipio (
    muni_codigo integer NOT NULL,
    muni_nome character varying(60) NOT NULL,
    esta_codigo integer NOT NULL
);


ALTER TABLE municipio OWNER TO postgres;

--
-- Name: municipio_seq_1; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE municipio_seq_1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE municipio_seq_1 OWNER TO postgres;

--
-- Name: municipio_seq_1; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE municipio_seq_1 OWNED BY municipio.muni_codigo;


--
-- Name: pedido; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pedido (
    pedi_codigo integer NOT NULL,
    pedi_data_criacao timestamp without time zone NOT NULL,
    pedi_data_alteracao timestamp without time zone NOT NULL,
    clien_codigo integer NOT NULL,
    usua_codigo integer NOT NULL,
    fopa_codigo integer NOT NULL
);


ALTER TABLE pedido OWNER TO postgres;

--
-- Name: pedido_produto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pedido_produto (
    pepr_codigo integer NOT NULL,
    pedi_codigo integer NOT NULL,
    pepr_nome character varying(160) NOT NULL,
    pepr_quantidade integer NOT NULL,
    pepr_valor numeric(10,2) NOT NULL,
    prod_codigo integer NOT NULL
);


ALTER TABLE pedido_produto OWNER TO postgres;

--
-- Name: pedido_produto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pedido_produto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pedido_produto_seq OWNER TO postgres;

--
-- Name: pedido_produto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pedido_produto_seq OWNED BY pedido_produto.pepr_codigo;


--
-- Name: pedido_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pedido_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pedido_seq OWNER TO postgres;

--
-- Name: pedido_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pedido_seq OWNED BY pedido.pedi_codigo;


--
-- Name: produto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE produto (
    prod_codigo integer NOT NULL,
    prod_nome character varying(160) NOT NULL,
    cate_codigo integer NOT NULL,
    fabr_codigo integer NOT NULL,
    prod_valor numeric(10,2) NOT NULL,
    prod_estoque integer NOT NULL
);


ALTER TABLE produto OWNER TO postgres;

--
-- Name: produto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE produto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE produto_seq OWNER TO postgres;

--
-- Name: produto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE produto_seq OWNED BY produto.prod_codigo;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuario (
    usua_codigo integer NOT NULL,
    usua_nome character varying(120) NOT NULL,
    usua_email character varying(100) NOT NULL,
    usua_senha character varying(60) NOT NULL,
    usua_tipo smallint NOT NULL,
    usua_habilitado boolean NOT NULL,
    usua_auth_key character varying(32) NOT NULL
);


ALTER TABLE usuario OWNER TO postgres;

--
-- Name: COLUMN usuario.usua_tipo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN usuario.usua_tipo IS '1 = Admin
2 = Gerente
3 = Vendedor';


--
-- Name: usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuario_seq OWNER TO postgres;

--
-- Name: usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuario_seq OWNED BY usuario.usua_codigo;


--
-- Name: cate_codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categoria ALTER COLUMN cate_codigo SET DEFAULT nextval('categoria_seq'::regclass);


--
-- Name: clien_codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cliente ALTER COLUMN clien_codigo SET DEFAULT nextval('cliente_clien_seq'::regclass);


--
-- Name: esta_codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estado ALTER COLUMN esta_codigo SET DEFAULT nextval('estado_esta_seq'::regclass);


--
-- Name: fabr_codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY fabricante ALTER COLUMN fabr_codigo SET DEFAULT nextval('fabricante_seq'::regclass);


--
-- Name: fopa_codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY forma_pagamento ALTER COLUMN fopa_codigo SET DEFAULT nextval('forma_pagamento_seq'::regclass);


--
-- Name: muni_codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY municipio ALTER COLUMN muni_codigo SET DEFAULT nextval('municipio_seq_1'::regclass);


--
-- Name: pedi_codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido ALTER COLUMN pedi_codigo SET DEFAULT nextval('pedido_seq'::regclass);


--
-- Name: pepr_codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido_produto ALTER COLUMN pepr_codigo SET DEFAULT nextval('pedido_produto_seq'::regclass);


--
-- Name: prod_codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto ALTER COLUMN prod_codigo SET DEFAULT nextval('produto_seq'::regclass);


--
-- Name: usua_codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario ALTER COLUMN usua_codigo SET DEFAULT nextval('usuario_seq'::regclass);


--
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY categoria (cate_codigo, cate_nome) FROM stdin;
2	Roupa
3	Acessório
4	Calçado
5	lectus rutrum
6	odio tristique
7	tortor, dictum
8	congue, elit sed
9	dictum cursus.
10	augue ac
11	mauris. Morbi non
12	euismod et, commodo
13	natoque penatibus
14	nunc, ullamcorper eu,
15	Ut nec
16	litora torquent
17	nonummy
18	sit amet lorem
19	Nunc mauris
20	non, cursus
21	cubilia Curae;
22	Nam nulla
23	commodo
24	enim. Suspendisse aliquet,
25	aliquet,
26	vel,
27	elit.
28	elit. Aliquam
29	Pellentesque
30	lorem fringilla
31	euismod enim. Etiam
32	hendrerit. Donec
33	tristique
34	Praesent eu
35	ac
36	ridiculus mus.
37	in, tempus
38	id, libero.
39	ac
40	ut lacus.
41	eleifend, nunc risus
42	quis,
43	orci. Donec nibh.
44	Nullam
45	In
46	eget metus
47	Integer urna. Vivamus
48	Aliquam nisl.
49	et pede.
50	egestas. Aliquam fringilla
51	nulla. Cras
52	euismod
53	non
54	tempus scelerisque,
55	ipsum non arcu.
56	tortor,
57	In condimentum.
58	ac
59	ipsum. Suspendisse sagittis.
60	congue a, aliquet
61	augue
62	id risus
63	tempus
64	Curae; Donec tincidunt.
65	ut quam
66	mattis
67	sit amet, consectetuer
68	lectus
69	montes, nascetur ridiculus
70	tincidunt.
71	nulla. Cras
72	mi, ac mattis
73	eu lacus.
74	et malesuada
75	erat
76	vitae
77	Cras
78	Donec tincidunt. Donec
79	amet massa.
80	luctus sit amet,
81	Phasellus
82	vitae
83	condimentum
84	porttitor tellus non
85	cursus in,
86	arcu.
87	mus.
88	cursus. Nunc
89	nisl.
90	in faucibus orci
91	scelerisque mollis.
92	eu
93	Maecenas iaculis
94	et, commodo at,
95	mi, ac
96	a feugiat tellus
97	luctus. Curabitur
98	Sed pharetra,
99	tellus lorem eu
100	commodo at, libero.
101	posuere,
102	nascetur ridiculus mus.
103	euismod in,
104	Vivamus nisi. Mauris
\.


--
-- Name: categoria_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('categoria_seq', 104, true);


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cliente (clien_codigo, clien_nome, clien_tipo, clien_cpf_cnpj, clien_email, muni_codigo) FROM stdin;
1	Cliente Teste	1	qweqweqweq	cliente.teste@email.com	1
2	Shad L. Colon	5	16801215-8682	cursus.et.magna@purusac.ca	1
3	Deborah Walter	7	16120324-8859	In@Integervitae.edu	1
4	Honorato Y. Sawyer	5	16320211-2029	vulputate@malesuadautsem.ca	1
5	Fay Stokes	3	16810105-9429	sagittis@ornare.ca	1
6	Hannah T. Cote	8	16430602-5216	Sed@magnatellusfaucibus.com	1
7	Velma Kirkland	4	16390918-8439	ac@magnaetipsum.edu	1
8	Eric P. Valenzuela	8	16760829-2442	Aliquam@ullamcorpereu.com	1
9	Eric Sanchez	7	16700222-8083	vulputate@Cras.edu	1
10	Risa Fisher	10	16020412-5652	Aliquam@posuereenim.com	1
11	Kitra X. Gill	6	16110126-6375	sed.sapien@loremluctusut.co.uk	1
12	Elizabeth Z. Dyer	10	16801210-8042	rutrum.eu@elitdictum.ca	1
13	Ima Marsh	5	16800412-3330	quis.massa.Mauris@necimperdietnec.edu	1
14	Nicole E. Daugherty	1	16100323-8472	Integer@venenatisvelfaucibus.net	1
15	Carly E. Larson	9	16330318-4414	Aenean@Proinnislsem.org	1
16	Julian Q. Ashley	4	16790407-5038	dui.in@dapibusligulaAliquam.ca	1
17	Armando G. Mosley	2	16230111-2385	Nullam.vitae.diam@molestie.co.uk	1
18	Samantha I. Le	10	16581030-9806	Vestibulum.ante.ipsum@eueros.co.uk	1
19	Meredith Alston	4	16430225-6955	Aenean@eratEtiamvestibulum.edu	1
20	Whitney P. Gentry	8	16890412-6904	fermentum@felis.net	1
21	Eric Emerson	9	16020829-7242	penatibus.et@pedeetrisus.net	1
22	Kellie M. Gordon	3	16800102-1677	feugiat.placerat@aliquamenim.com	1
23	Risa A. Watkins	9	16410120-0717	facilisis.facilisis.magna@odiosagittis.co.uk	1
24	Iola E. Dejesus	5	16701229-9827	adipiscing.elit.Curabitur@sodales.com	1
25	Ferdinand Lang	1	16391005-6492	feugiat.nec@Suspendissecommodo.co.uk	1
26	Hilary R. Rutledge	3	16011024-3482	purus.accumsan.interdum@scelerisquesedsapien.ca	1
27	Piper Rivas	1	16951219-8988	at@velitjustonec.edu	1
28	Hillary K. Hendrix	9	16241004-8389	blandit@elitdictumeu.edu	1
29	Bryar Oliver	8	16481026-3501	bibendum.ullamcorper.Duis@ipsumnuncid.co.uk	1
30	Conan Dejesus	1	16560826-7299	nec.luctus.felis@hendreritidante.co.uk	1
31	Ferris G. Baker	9	16551207-7578	orci@vestibulumMauris.edu	1
32	Galvin S. Cohen	10	16840602-5497	dolor@luctus.org	1
33	Alexandra C. Montgomery	2	16070716-2657	mi.fringilla@Nunclectus.org	1
34	Nathan K. Bolton	2	16911020-7652	purus@lectus.ca	1
35	Olivia V. Rodriguez	10	16590828-1016	volutpat.ornare.facilisis@molestietellus.com	1
36	Athena R. Acosta	2	16640627-3588	pharetra.Quisque@acfermentumvel.net	1
37	Melanie Q. Ortiz	6	16261120-4468	nibh.Phasellus.nulla@amet.co.uk	1
38	Driscoll H. Beck	10	16331019-7029	quis.pede@nostraper.ca	1
39	Driscoll L. Wallace	6	16811105-1358	nonummy.ac.feugiat@per.edu	1
40	Ursula V. Grimes	8	16770313-4424	metus.urna@elita.com	1
41	Eliana T. Holt	6	16230822-4977	nisi.sem.semper@ligulaNullamenim.edu	1
42	Yael Barber	5	16390308-5417	Nulla@Pellentesquetincidunt.ca	1
43	Nyssa Y. Owen	5	16540412-6038	lobortis@vulputatemauris.ca	1
44	Hedwig E. Lamb	5	16480921-4648	lobortis.quam.a@gravida.ca	1
45	Karyn L. Holden	6	16470203-6510	eros@utquam.org	1
46	Freya Wall	9	16410420-9426	nisl.Nulla.eu@tincidunt.edu	1
47	Quemby W. Gregory	5	16470416-7719	interdum.ligula@orciquislectus.co.uk	1
48	Idona S. Albert	10	16781202-7139	Suspendisse.dui@ametmetusAliquam.com	1
49	Alea M. Rivera	4	16850823-5085	In.mi.pede@lacusQuisqueimperdiet.co.uk	1
50	Kendall Rivas	9	16560726-3356	Nulla.semper.tellus@sempertellus.edu	1
51	MacKenzie O. Neal	9	16641117-7782	nunc@malesuadaIntegerid.com	1
52	Leroy Maddox	3	16850901-3127	et.pede.Nunc@Nullamscelerisque.org	1
53	Carson M. Sykes	7	16870212-5702	Aliquam.erat.volutpat@elit.edu	1
54	Edward V. Robinson	4	16870106-2609	nonummy@Phasellus.ca	1
55	Xyla Patton	6	16900129-6004	pede.nec.ante@odio.net	1
56	Nola Lewis	10	16810618-4875	pede.Cras@odiovelest.co.uk	1
57	Kirk S. Blackwell	7	16310316-1414	aliquet@arcuSedet.com	1
58	Margaret K. Schmidt	6	16380125-4222	rhoncus.Donec.est@necorciDonec.org	1
59	Denise Jefferson	8	16260405-1355	placerat.eget@sagittis.co.uk	1
60	Zachery Cherry	3	16541113-3613	pharetra.ut@congue.co.uk	1
61	Avram I. Bruce	4	16150522-6892	consectetuer.cursus.et@arcu.org	1
62	Eugenia P. Hogan	8	16110925-7756	risus.Donec@adipiscingelit.com	1
63	Margaret L. Nguyen	6	16160410-7456	eu@duinec.com	1
64	Ingrid Stout	8	16830116-4730	nibh.vulputate.mauris@Cum.edu	1
65	Akeem Myers	4	16480507-2248	Maecenas@Maurisnondui.org	1
66	Shellie Z. Jacobson	4	16570512-1019	egestas.a@Fuscediam.co.uk	1
67	Giacomo Oconnor	10	16610901-8272	at@odio.edu	1
68	Scarlet B. Burton	2	16711208-5829	odio.Etiam.ligula@mollisneccursus.net	1
69	Holmes W. Kent	8	16071206-8535	tristique.aliquet.Phasellus@commodoauctorvelit.com	1
70	Regina Y. Chapman	2	16280529-2626	Donec.porttitor.tellus@maurisa.org	1
71	Isadora Little	6	16970908-4090	in.molestie@cursusa.edu	1
72	Angelica Garrison	1	16430311-2215	feugiat.non@Maurisvelturpis.org	1
73	Renee Montoya	6	16540412-9024	orci.Donec.nibh@in.ca	1
74	Rashad Swanson	2	16010904-0014	fringilla@faucibusut.net	1
75	Yuri H. Powell	9	16411216-4225	fames@fermentum.ca	1
76	Bo D. Walsh	9	16320330-6539	in@dolorQuisque.com	1
77	Kieran Watkins	1	16920311-7628	eget.metus.In@sapiencursusin.ca	1
78	Akeem Y. Ball	1	16900412-1068	Suspendisse.aliquet.sem@estmollis.org	1
79	Janna Schmidt	10	16210418-3864	diam.vel.arcu@nibhdolornonummy.ca	1
80	Zephr U. Melton	3	16600317-3967	facilisi@nequeNullam.com	1
81	Sierra L. Montoya	2	16321219-1153	ipsum.Suspendisse@nonummy.edu	1
82	Tyler Michael	3	16640914-6823	magna.sed.dui@facilisiSedneque.net	1
83	Lane V. Moss	1	16421202-7207	ridiculus.mus.Proin@ametconsectetueradipiscing.co.uk	1
84	Fritz G. Hester	4	16840906-2489	Curabitur@odiosemper.org	1
85	Kennedy D. Hayden	4	16410724-5492	diam@justo.ca	1
86	Colby Simpson	7	16770928-9941	neque@adlitora.org	1
87	Chase Moody	8	16791018-2562	Suspendisse.eleifend@luctusvulputate.edu	1
88	Byron X. Lee	7	16450417-7983	non@ut.edu	1
89	Nichole M. Espinoza	5	16440827-7848	at.arcu.Vestibulum@magna.ca	1
90	Regan M. Buck	6	16840125-1031	mollis@sitamet.net	1
91	Phelan Page	8	16990830-0107	turpis.In@cubiliaCurae.com	1
92	Kirby E. Huber	2	16770501-5324	Sed@Donectempor.co.uk	1
93	Lynn T. Cleveland	9	16010810-3680	sapien.cursus.in@adipiscinglobortisrisus.com	1
94	Robert S. Shepard	1	16690511-1024	rutrum.magna@metusVivamuseuismod.ca	1
95	Destiny Merrill	10	16420206-9573	dui@Aeneanegetmetus.co.uk	1
96	Walter Preston	7	16070710-0616	aliquet.libero.Integer@eget.com	1
97	Aphrodite Stout	4	16190502-2875	at.pretium@fringillaest.com	1
98	Melissa K. Holman	9	16170403-8619	egestas.Fusce@Nullafacilisis.net	1
99	Erasmus Herman	3	16420708-4791	vestibulum@nec.ca	1
100	Cailin Y. Chen	3	16060406-0012	mi.enim@ultricies.com	1
101	Xenos Bentley	1	16991128-6970	lectus.quis@commodoatlibero.org	1
\.


--
-- Name: cliente_clien_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cliente_clien_seq', 101, true);


--
-- Data for Name: estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY estado (esta_codigo, esta_nome) FROM stdin;
1	AM
\.


--
-- Name: estado_esta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('estado_esta_seq', 1, true);


--
-- Data for Name: fabricante; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY fabricante (fabr_codigo, fabr_nome) FROM stdin;
1	Nike
2	Adidas
3	non
4	nec,
5	semper egestas, urna
6	posuere
7	et, rutrum
8	aliquam eros
9	primis in faucibus
10	porta
11	lectus convallis est,
12	egestas. Aliquam fringilla
13	nunc ac
14	sociis natoque
15	Maecenas
16	a feugiat tellus
17	erat.
18	dolor.
19	libero at auctor
20	aptent taciti
21	pede.
22	congue turpis. In
23	Nullam feugiat
24	magna, malesuada vel,
25	pellentesque massa
26	Sed nec metus
27	amet nulla.
28	purus. Nullam scelerisque
29	semper tellus
30	ante. Vivamus
31	eu
32	magnis dis
33	fringilla.
34	ipsum
35	tempor, est ac
36	bibendum ullamcorper. Duis
37	Phasellus elit
38	non lorem
39	ante blandit viverra.
40	neque.
41	ut, molestie
42	consequat dolor vitae
43	senectus
44	fringilla mi
45	sit amet
46	Nulla
47	orci lobortis augue
48	purus gravida sagittis.
49	Nullam scelerisque neque
50	dolor.
51	at arcu. Vestibulum
52	elementum,
53	Phasellus ornare. Fusce
54	sit amet
55	sollicitudin commodo ipsum.
56	arcu.
57	Vivamus sit
58	Donec feugiat
59	venenatis lacus.
60	a
61	Suspendisse aliquet
62	vel
63	magna. Sed
64	taciti
65	amet
66	non arcu. Vivamus
67	ipsum non
68	dignissim pharetra.
69	congue
70	Sed
71	ligula. Aenean
72	libero at auctor
73	Vivamus nibh
74	fringilla cursus
75	sed dolor.
76	pede. Praesent eu
77	In
78	Duis at
79	erat volutpat. Nulla
80	adipiscing lobortis
81	Morbi vehicula. Pellentesque
82	Cras pellentesque.
83	eu
84	cursus,
85	odio sagittis semper.
86	Cum sociis
87	vitae
88	convallis in, cursus
89	lacinia. Sed congue,
90	ornare lectus
91	consequat enim
92	orci quis
93	massa. Vestibulum accumsan
94	turpis nec mauris
95	euismod
96	feugiat nec, diam.
97	elit. Nulla facilisi.
98	Fusce
99	venenatis a,
100	justo sit amet
101	id nunc
102	Suspendisse sed dolor.
\.


--
-- Name: fabricante_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('fabricante_seq', 102, true);


--
-- Data for Name: forma_pagamento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY forma_pagamento (fopa_codigo, fopa_nome) FROM stdin;
1	Crédito
2	Débito
\.


--
-- Name: forma_pagamento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('forma_pagamento_seq', 2, true);


--
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY municipio (muni_codigo, muni_nome, esta_codigo) FROM stdin;
1	Manaus	1
\.


--
-- Name: municipio_seq_1; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('municipio_seq_1', 1, true);


--
-- Data for Name: pedido; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pedido (pedi_codigo, pedi_data_criacao, pedi_data_alteracao, clien_codigo, usua_codigo, fopa_codigo) FROM stdin;
1	2016-07-19 14:04:05.737669	2016-07-19 14:04:05.737669	1	1	1
2	2016-07-21 16:29:46.966397	2016-07-21 16:29:46.966397	1	1	2
3	2015-11-01 16:50:58	2017-03-25 05:12:36	20	1	1
4	2015-11-20 14:06:19	2017-01-01 22:28:06	94	1	2
5	2015-11-13 14:05:05	2016-12-22 09:12:07	94	1	1
6	2015-10-02 08:00:25	2016-03-19 07:54:49	28	1	2
7	2016-05-20 15:13:40	2017-04-14 06:19:58	4	1	2
8	2017-05-05 03:18:35	2017-01-24 10:49:31	11	1	2
9	2015-12-04 15:35:38	2015-11-30 20:34:17	22	1	1
10	2016-11-28 22:03:11	2016-03-10 09:34:39	96	1	2
11	2015-10-11 02:18:59	2015-12-12 17:13:53	1	1	2
12	2015-11-10 10:01:56	2015-12-09 23:28:46	35	1	2
13	2016-05-24 14:27:57	2016-09-20 05:59:13	42	1	2
14	2015-10-06 14:03:32	2017-06-02 20:29:56	95	1	1
15	2016-11-27 14:18:27	2017-04-28 02:13:01	56	1	2
16	2017-04-07 19:56:15	2016-03-29 17:43:04	71	1	2
17	2017-06-16 02:29:34	2015-08-09 03:46:48	85	1	2
18	2016-09-12 09:07:09	2017-06-04 22:50:59	15	1	2
19	2017-07-05 11:30:51	2017-05-20 13:49:13	69	1	2
20	2016-01-02 13:01:14	2016-04-06 09:13:24	98	1	1
21	2016-09-06 17:15:37	2015-07-30 17:09:02	35	1	2
22	2016-10-14 10:29:38	2017-07-09 05:03:09	74	1	2
23	2017-01-10 20:43:53	2015-09-27 05:59:02	1	1	2
24	2017-06-01 02:43:09	2017-01-18 05:14:03	35	1	1
25	2017-06-15 02:55:58	2016-06-09 03:20:50	84	1	1
26	2016-09-25 00:52:27	2017-05-15 23:39:05	87	1	1
27	2017-02-08 09:59:15	2017-06-24 22:41:44	98	1	2
28	2016-08-28 00:10:49	2016-03-31 08:53:20	86	1	1
29	2016-07-22 04:50:17	2016-01-22 15:34:26	25	1	1
30	2016-03-19 21:38:10	2016-05-29 00:27:56	63	1	1
31	2015-08-18 10:33:03	2017-04-19 11:25:18	7	1	1
32	2016-11-17 20:02:08	2016-01-19 14:27:21	37	1	1
33	2016-02-10 19:50:29	2015-11-22 02:01:28	73	1	2
34	2017-04-21 12:07:51	2017-03-14 15:04:47	38	1	1
35	2017-07-09 00:45:02	2017-05-07 15:04:53	96	1	2
36	2017-05-21 12:58:24	2015-10-17 13:46:29	53	1	2
37	2016-05-31 19:09:33	2016-07-21 21:04:35	96	1	1
38	2016-08-17 10:44:29	2016-04-09 07:57:03	31	1	2
39	2016-12-07 20:08:14	2017-07-03 18:30:25	71	1	1
40	2016-11-24 14:56:38	2015-12-11 05:36:52	80	1	1
41	2016-02-25 07:41:26	2016-08-04 18:01:25	18	1	1
42	2017-02-04 17:05:08	2016-10-03 05:56:31	10	1	1
43	2017-02-20 20:46:07	2017-01-08 10:16:21	77	1	2
44	2016-03-09 01:22:43	2016-04-24 16:33:17	81	1	2
45	2016-11-03 22:33:56	2016-08-01 01:39:05	64	1	1
46	2016-07-21 08:10:37	2016-02-27 01:37:23	44	1	1
47	2016-02-22 10:59:49	2017-01-03 13:07:10	62	1	2
48	2016-02-25 08:24:26	2016-05-18 08:36:11	44	1	1
49	2015-12-31 03:47:19	2016-04-05 15:50:27	8	1	1
50	2016-12-08 11:06:10	2016-08-20 11:24:25	37	1	2
51	2016-03-04 17:44:34	2016-12-21 16:25:37	93	1	1
52	2016-10-25 12:21:48	2015-12-09 15:01:14	97	1	1
53	2016-09-13 13:54:12	2015-10-22 07:36:16	92	1	1
54	2017-03-18 20:17:47	2016-09-15 14:23:16	60	1	2
55	2017-05-29 21:09:24	2016-11-11 10:35:49	23	1	2
56	2016-12-04 09:59:49	2017-02-01 07:40:23	56	1	1
57	2016-08-14 19:57:04	2017-02-21 10:10:59	18	1	2
58	2016-12-06 08:19:45	2016-09-06 21:22:07	31	1	2
59	2015-09-15 14:59:29	2015-08-22 03:20:16	95	1	1
60	2015-10-08 23:14:48	2016-07-03 16:49:36	44	1	1
61	2017-07-18 09:47:15	2016-04-06 10:23:57	74	1	1
62	2017-03-14 17:37:02	2016-08-18 17:12:28	84	1	2
63	2015-10-05 18:06:17	2017-05-10 22:12:53	81	1	2
64	2016-05-30 05:18:38	2017-01-27 13:05:01	30	1	1
65	2015-09-22 01:13:15	2017-02-18 05:07:07	53	1	1
66	2017-07-16 01:49:43	2017-06-07 18:13:28	95	1	2
67	2016-07-03 10:31:37	2016-09-22 15:10:49	85	1	1
68	2016-12-02 23:36:15	2015-07-24 00:50:05	21	1	1
69	2017-02-19 05:59:44	2015-10-11 00:42:50	85	1	2
70	2017-05-12 05:23:45	2016-06-27 15:58:17	82	1	2
71	2015-08-26 09:12:53	2017-02-21 06:58:21	71	1	2
72	2017-04-26 21:02:18	2017-01-21 18:27:57	20	1	1
73	2016-02-22 21:31:31	2017-07-10 14:19:18	76	1	2
74	2016-03-27 15:48:14	2015-08-09 06:34:13	9	1	1
75	2017-03-31 12:50:30	2016-04-19 14:21:29	6	1	1
76	2015-12-06 03:55:34	2015-12-14 22:37:21	6	1	1
77	2016-05-07 08:22:28	2017-01-29 10:39:19	56	1	2
78	2016-05-18 06:27:01	2017-03-26 00:40:38	97	1	1
79	2016-10-08 17:23:11	2016-05-21 20:27:30	100	1	2
80	2016-07-18 12:02:48	2016-12-02 22:15:36	77	1	2
81	2017-01-04 04:20:11	2017-01-29 11:50:07	94	1	2
82	2015-10-05 08:59:02	2017-06-15 21:20:23	31	1	1
83	2015-08-15 16:11:13	2016-09-27 06:33:13	50	1	2
84	2017-01-15 02:54:19	2016-09-29 19:12:39	9	1	2
85	2016-05-17 01:26:40	2016-03-15 16:20:43	48	1	1
86	2017-06-28 21:43:48	2016-05-05 11:56:03	24	1	1
87	2016-06-20 11:26:07	2016-03-13 13:02:38	66	1	2
88	2015-12-22 10:25:40	2016-07-07 02:19:39	47	1	2
89	2016-08-18 06:08:01	2017-01-28 02:31:24	63	1	1
90	2015-08-30 10:44:26	2016-06-01 15:59:08	65	1	1
91	2016-05-27 22:29:32	2017-01-16 08:24:11	70	1	2
92	2016-12-08 16:50:22	2015-10-21 09:52:50	52	1	2
93	2016-02-06 09:31:58	2015-07-26 10:49:01	98	1	1
94	2016-07-03 14:17:21	2016-12-29 09:49:45	96	1	1
95	2015-09-06 10:19:01	2017-01-02 15:31:39	63	1	1
96	2016-01-10 05:42:10	2016-01-05 10:29:55	65	1	1
97	2017-06-26 05:07:18	2016-04-28 13:47:48	55	1	2
98	2016-12-04 19:41:59	2016-01-19 13:06:05	14	1	2
99	2015-08-11 19:40:22	2017-04-21 02:30:01	25	1	2
100	2016-02-28 20:35:06	2016-07-12 20:02:19	36	1	2
101	2015-10-15 06:08:50	2017-06-28 00:58:20	45	1	1
102	2015-09-13 03:44:47	2016-06-19 15:13:47	85	1	2
\.


--
-- Data for Name: pedido_produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pedido_produto (pepr_codigo, pedi_codigo, pepr_nome, pepr_quantidade, pepr_valor, prod_codigo) FROM stdin;
88	72	Jaden Heath	5	193.16	74
89	67	Kenyon Stewart	9	45.63	112
90	71	Rose Franco	9	386.49	70
91	1	Medge Bradshaw	7	491.50	99
92	21	Wilma Marshall	6	717.07	47
93	54	Grace Mcdowell	5	903.18	84
94	88	Asher Daugherty	9	996.16	122
95	1	Ruth Jimenez	8	321.21	83
96	96	Eden Jennings	4	592.82	96
97	102	Naida Chan	10	569.87	104
98	16	Nelle Bauer	6	660.28	69
15	1	Camisas	13	2600.00	1
16	1	Camisetas	2	400.00	1
17	1	Camisa	1	200.00	1
99	56	Ifeoma Cline	10	17.14	104
100	78	Zachary Christensen	9	506.71	75
101	49	Bertha Fields	1	239.91	69
102	99	Hanna Fuentes	2	414.47	64
103	39	Hayes Osborne	9	663.73	125
104	28	Maggy Bowman	10	651.40	97
105	89	Orla Whitaker	8	138.59	123
106	49	Adena Baker	8	488.58	96
107	65	Naida Scott	6	451.91	91
108	15	Phelan Bradley	6	74.06	77
109	101	Shana Peck	6	216.61	134
110	89	Zoe Mcmahon	3	131.25	79
111	16	Anastasia Burton	7	42.02	104
112	64	Britanney David	1	376.99	134
113	57	Barry Stafford	2	541.39	141
114	52	Martena Macias	9	24.30	105
115	32	Felix Buchanan	7	830.25	83
116	93	Octavius Greene	2	198.84	75
117	66	Ciaran Gross	2	831.94	102
118	68	Cairo Yates	8	992.99	113
119	88	Paula Clements	9	618.15	107
120	42	Eric Olson	5	59.12	106
121	64	Caleb Mclean	5	609.36	111
122	28	Allen Murray	7	719.93	118
123	84	Wynter Wiley	1	369.74	113
124	58	Justin Thomas	9	693.21	128
125	22	Heidi Perry	3	653.82	120
126	99	Hop Justice	1	43.85	88
127	87	Ciara Pruitt	2	648.68	137
128	44	Kiara Silva	6	995.15	129
129	16	Carson Summers	8	11.16	113
130	9	Grady King	6	175.80	44
131	18	Drake Zimmerman	7	582.22	141
132	42	Dominique Hahn	2	420.06	75
133	3	Pascale Hubbard	6	33.94	50
134	50	Ignacia Owen	8	667.97	118
135	56	Emma Leon	1	333.51	128
136	75	Kaitlin Mclean	5	266.34	75
137	95	Logan Francis	7	723.52	118
138	57	Baxter Whitney	10	238.76	84
139	21	Anthony Campbell	9	366.67	124
140	18	Howard Lindsay	9	875.46	91
141	100	Jaime Daugherty	2	195.00	68
142	73	Ginger Estrada	5	665.99	61
143	43	Dara Jones	10	89.89	111
144	32	Aline Gonzales	3	854.41	81
145	1	Fallon Roy	3	157.94	125
146	48	Isaac Dejesus	3	17.41	105
147	9	Samson Salazar	6	741.88	53
148	42	Chandler Miles	9	487.41	94
149	74	Casey Daniels	4	152.15	124
150	44	Elvis George	7	446.25	117
151	93	Inez Orr	2	296.94	81
152	88	Leilani Olson	3	224.88	110
153	78	Germaine Oneill	3	240.88	102
154	72	Nora Hawkins	6	665.30	131
155	60	Ursula Carver	7	140.60	86
156	16	Nyssa Woodward	1	112.87	93
157	63	Briar Wall	9	651.26	91
158	46	Maile Castro	6	869.94	113
159	48	Whitney Calderon	3	304.64	92
160	52	Kai Lyons	7	629.36	115
161	33	Jeremy Maldonado	6	641.87	106
162	81	Rebecca Sutton	6	679.26	74
163	16	Ursula Justice	9	78.41	126
164	94	Deborah Vaughan	9	162.30	123
165	11	Echo Reyes	2	24.58	123
166	49	Boris Peters	8	429.36	60
167	63	Catherine Graves	5	957.17	69
168	83	Merrill Beasley	10	259.89	68
169	4	Keefe Maddox	5	775.79	96
170	22	Germane Hodges	2	981.48	84
171	7	Patrick Mendoza	10	327.97	61
172	83	Eric Ayers	2	713.49	46
173	60	Catherine Humphrey	9	399.70	66
174	102	Ashely Fuentes	3	924.60	121
175	4	Aimee Wagner	7	871.99	141
176	25	Jameson Mooney	2	237.05	117
177	37	Wyatt Gay	9	905.61	107
178	95	Hillary Moore	2	833.29	95
179	67	Aristotle Frost	3	659.10	136
180	47	Amber Grant	2	561.58	123
181	50	MacKenzie Haney	9	310.26	119
182	86	Kyra Ramirez	8	849.24	117
183	28	Chadwick Hensley	4	875.77	81
184	24	Wesley Briggs	1	468.81	88
185	1	Walker Blevins	8	423.08	63
186	63	Mason Harvey	3	136.86	132
187	66	Travis Munoz	1	953.99	129
\.


--
-- Name: pedido_produto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pedido_produto_seq', 187, true);


--
-- Name: pedido_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pedido_seq', 102, true);


--
-- Data for Name: produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY produto (prod_codigo, prod_nome, cate_codigo, fabr_codigo, prod_valor, prod_estoque) FROM stdin;
1	Camiseta Nike	2	1	200.00	29
42	et magnis	56	49	186.02	10
43	ullamcorper,	58	11	867.14	25
44	mi.	53	52	121.18	46
45	nonummy ut,	18	87	39.61	34
46	Sed	77	82	178.15	63
47	sit amet,	2	92	338.49	59
48	Quisque purus	99	70	144.38	4
49	ultrices	58	23	549.26	70
50	Donec luctus	79	18	505.47	23
51	nibh enim,	88	49	706.83	37
52	netus	3	69	703.25	46
53	imperdiet, erat	39	18	809.98	61
54	dis parturient	72	57	763.52	9
55	massa.	67	36	61.75	26
56	justo	5	16	465.02	1
57	Donec at	59	15	120.09	36
58	purus. Nullam	31	13	505.45	23
59	massa. Suspendisse	39	33	739.16	36
60	non, dapibus	103	13	101.34	22
61	tincidunt. Donec	43	91	850.56	76
62	ante bibendum	77	101	999.40	6
63	augue ac	76	17	194.77	99
64	rutrum,	91	73	355.51	56
65	ornare	70	30	930.33	81
66	nunc sed	78	88	628.29	9
67	eu nibh	34	40	752.18	7
68	porttitor eros	21	89	626.42	62
69	in,	44	91	234.42	86
70	aliquam	7	45	799.01	97
71	cursus, diam	68	27	149.23	9
72	molestie.	83	36	875.46	7
73	Nunc	47	75	102.09	26
74	venenatis a,	91	43	892.59	61
75	faucibus	29	52	186.60	16
76	nec orci.	68	4	718.91	86
77	imperdiet ornare.	90	65	891.96	84
78	eu,	83	22	569.59	66
79	velit. Sed	40	11	596.53	99
80	vel, mauris.	56	4	525.50	50
81	velit. Aliquam	75	16	146.70	71
82	Fusce fermentum	82	96	604.73	26
83	erat	93	70	435.42	43
84	semper pretium	49	76	964.81	73
85	mauris ipsum	49	5	100.38	78
86	nunc	31	84	188.48	8
87	cursus et,	51	52	885.57	33
88	gravida	85	89	238.76	59
89	non,	38	48	464.47	17
90	Donec non	55	22	710.91	44
91	neque. Sed	82	6	94.18	72
92	ut	76	45	544.93	19
93	odio.	85	66	688.41	99
94	at	71	57	154.81	65
95	Cras pellentesque.	51	94	73.51	7
96	Nulla	76	34	231.85	64
97	nibh vulputate	8	1	780.66	79
98	molestie	81	12	544.36	88
99	arcu.	95	70	993.59	66
100	In	59	45	77.78	40
101	nisl.	37	60	61.25	28
102	odio sagittis	5	101	754.62	69
103	amet risus.	4	71	826.29	52
104	nulla at	50	42	378.43	97
105	mollis vitae,	101	29	594.72	91
106	Aenean sed	24	7	854.22	11
107	sollicitudin	18	47	529.90	18
108	cursus, diam	56	100	374.91	96
109	augue	9	76	262.12	100
110	vulputate ullamcorper	93	43	607.64	49
111	imperdiet	28	93	519.97	55
112	vulputate ullamcorper	79	28	168.84	29
113	convallis	88	40	941.00	4
114	Phasellus	16	40	332.52	45
115	rutrum, justo.	47	44	821.70	75
116	fringilla est.	26	7	113.58	44
117	neque	15	9	641.30	93
118	enim,	72	32	450.31	1
119	Donec tempor,	6	64	499.65	94
120	dui,	9	82	840.26	1
121	elit,	93	9	814.10	33
122	enim.	52	32	487.24	15
123	luctus	18	27	71.61	96
124	porttitor interdum.	44	89	77.36	67
125	suscipit, est	6	12	724.85	95
126	ante.	96	23	811.25	42
127	sem	53	18	857.65	38
128	a	52	32	42.93	42
129	ut	8	74	269.44	53
130	Maecenas	41	66	226.09	92
131	Donec porttitor	68	50	256.47	77
132	eros. Proin	99	34	285.28	44
133	Morbi	11	66	83.38	38
134	neque.	53	86	359.20	68
135	semper egestas,	46	94	185.69	45
136	placerat, orci	63	73	991.02	57
137	iaculis nec,	79	55	904.91	44
138	Suspendisse aliquet	102	27	155.58	30
139	aliquet	7	22	113.49	32
140	purus mauris	84	99	443.42	95
141	enim, sit	64	39	240.52	81
\.


--
-- Name: produto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('produto_seq', 141, true);


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY usuario (usua_codigo, usua_nome, usua_email, usua_senha, usua_tipo, usua_habilitado, usua_auth_key) FROM stdin;
1	Usuário Teste	teste@email.com	$2y$13$QhE6spjyjFzVCZe4xJnREOtIrVEw4bWXPtjBt3ug2wzB64j6ZaSJy	1	t	Whr0w7tW3cVrFVNq6d0SLcFoBvJAZZ0X
\.


--
-- Name: usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuario_seq', 1, true);


--
-- Name: categoria_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY categoria
    ADD CONSTRAINT categoria_pk PRIMARY KEY (cate_codigo);


--
-- Name: cliente_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_pk PRIMARY KEY (clien_codigo);


--
-- Name: estado_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estado
    ADD CONSTRAINT estado_pk PRIMARY KEY (esta_codigo);


--
-- Name: fabricante_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY fabricante
    ADD CONSTRAINT fabricante_pk PRIMARY KEY (fabr_codigo);


--
-- Name: forma_pagamento_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY forma_pagamento
    ADD CONSTRAINT forma_pagamento_pk PRIMARY KEY (fopa_codigo);


--
-- Name: municipio_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT municipio_pk PRIMARY KEY (muni_codigo);


--
-- Name: pedido_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT pedido_pk PRIMARY KEY (pedi_codigo);


--
-- Name: pedido_produto_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pedido_produto
    ADD CONSTRAINT pedido_produto_pk PRIMARY KEY (pepr_codigo);


--
-- Name: produto_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY produto
    ADD CONSTRAINT produto_pk PRIMARY KEY (prod_codigo);


--
-- Name: usuario_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pk PRIMARY KEY (usua_codigo);


--
-- Name: categoria_produto_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto
    ADD CONSTRAINT categoria_produto_fk FOREIGN KEY (cate_codigo) REFERENCES categoria(cate_codigo);


--
-- Name: cliente_pedido_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT cliente_pedido_fk FOREIGN KEY (clien_codigo) REFERENCES cliente(clien_codigo);


--
-- Name: estado_municipio_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT estado_municipio_fk FOREIGN KEY (esta_codigo) REFERENCES estado(esta_codigo);


--
-- Name: fabricante_produto_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto
    ADD CONSTRAINT fabricante_produto_fk FOREIGN KEY (fabr_codigo) REFERENCES fabricante(fabr_codigo);


--
-- Name: forma_pagamento_pedido_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT forma_pagamento_pedido_fk FOREIGN KEY (fopa_codigo) REFERENCES forma_pagamento(fopa_codigo);


--
-- Name: municipio_cliente_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT municipio_cliente_fk FOREIGN KEY (muni_codigo) REFERENCES municipio(muni_codigo);


--
-- Name: pedido_pedido_produto_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido_produto
    ADD CONSTRAINT pedido_pedido_produto_fk FOREIGN KEY (pedi_codigo) REFERENCES pedido(pedi_codigo);


--
-- Name: produto_pedido_produto_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido_produto
    ADD CONSTRAINT produto_pedido_produto_fk FOREIGN KEY (prod_codigo) REFERENCES produto(prod_codigo);


--
-- Name: usuario_pedido_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT usuario_pedido_fk FOREIGN KEY (usua_codigo) REFERENCES usuario(usua_codigo);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

