--
-- PostgreSQL database dump
--

DROP TABLE IF EXISTS public.app_user CASCADE;
DROP TABLE IF EXISTS public.client CASCADE;
DROP TABLE IF EXISTS public.invoice CASCADE;

-- Dumped from database version 11.2 (Debian 11.2-1.pgdg90+1)
-- Dumped by pg_dump version 11.2 (Debian 11.2-1.pgdg90+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: app_user; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.app_user (
    app_user_id uuid NOT NULL,
    email character varying(180) NOT NULL,
    roles json NOT NULL,
    password character varying(255) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.app_user OWNER TO "user";

--
-- Name: client; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.client (
    client_id uuid NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.client OWNER TO "user";

--
-- Name: invoice; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.invoice (
    invoice_id uuid NOT NULL,
    client_id uuid NOT NULL,
    number character varying(255) NOT NULL,
    sent_at date,
    paid_at date,
    amount_ht integer NOT NULL,
    amount_ttc integer NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.invoice OWNER TO "user";

--
-- Data for Name: app_user; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.app_user (app_user_id, email, roles, password, created_at, updated_at) FROM stdin;
46d8faa9-f568-43ce-9043-193739dc7560	foo@bar.com	[]	$argon2i$v=19$m=1024,t=2,p=2$STZlYThYbjNaWjhLT1NIdw$MneC9DPXfux0rWh4areQE2rY3GCVJnyUbHmHKkR4Lj0	2019-04-14 15:08:39	2019-04-14 15:08:39
\.


--
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.client (client_id, name, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: invoice; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.invoice (invoice_id, client_id, number, sent_at, paid_at, amount_ht, amount_ttc, created_at, updated_at) FROM stdin;
\.


--
-- Name: app_user app_user_email_key; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.app_user
    ADD CONSTRAINT app_user_email_key UNIQUE (email);


--
-- Name: app_user app_user_pkey; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.app_user
    ADD CONSTRAINT app_user_pkey PRIMARY KEY (app_user_id);


--
-- Name: client client_pkey; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (client_id);


--
-- Name: invoice invoice_number_key; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.invoice
    ADD CONSTRAINT invoice_number_key UNIQUE (number);


--
-- Name: invoice invoice_pkey; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.invoice
    ADD CONSTRAINT invoice_pkey PRIMARY KEY (invoice_id);


--
-- Name: fk_invoice_client_id; Type: INDEX; Schema: public; Owner: user
--

CREATE INDEX fk_invoice_client_id ON public.invoice USING btree (client_id);


--
-- Name: invoice invoice_client_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.invoice
    ADD CONSTRAINT invoice_client_id_fkey FOREIGN KEY (client_id) REFERENCES public.client(client_id);


--
-- PostgreSQL database dump complete
--

