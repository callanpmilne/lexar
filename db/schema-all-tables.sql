--
-- PostgreSQL database dump
--

-- Dumped from database version 15.2
-- Dumped by pg_dump version 15.2

-- Started on 2024-10-06 17:37:14 AEDT

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 4 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: pg_database_owner
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO pg_database_owner;

--
-- TOC entry 3849 (class 0 OID 0)
-- Dependencies: 4
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: pg_database_owner
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 230 (class 1259 OID 17439)
-- Name: AccountBalances; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."AccountBalances" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "AccountID" uuid NOT NULL,
    "BalanceID" uuid NOT NULL
);


ALTER TABLE public."AccountBalances" OWNER TO postgres;

--
-- TOC entry 3850 (class 0 OID 0)
-- Dependencies: 230
-- Name: TABLE "AccountBalances"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."AccountBalances" IS 'Links an account with a balance';


--
-- TOC entry 234 (class 1259 OID 17469)
-- Name: AccountPayments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."AccountPayments" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "PaymentID" uuid NOT NULL,
    "AccountID" uuid NOT NULL,
    "Received" bigint NOT NULL,
    "Description" character varying(150) DEFAULT NULL::character varying
);


ALTER TABLE public."AccountPayments" OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 17434)
-- Name: Accounts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Accounts" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "Name" character varying(80) NOT NULL,
    "Opened" bigint NOT NULL,
    "Closed" bigint
);


ALTER TABLE public."Accounts" OWNER TO postgres;

--
-- TOC entry 3853 (class 0 OID 0)
-- Dependencies: 229
-- Name: TABLE "Accounts"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."Accounts" IS 'Accounts have a balance, invoices and (credit+debit) transactions';


--
-- TOC entry 238 (class 1259 OID 17523)
-- Name: ApiRouteHandlers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."ApiRouteHandlers" (
    "ApiRouteHandlerID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "ApiRouteID" uuid NOT NULL,
    "HandlerType" character varying(60) DEFAULT 'URL_CALLBACK'::character varying,
    "HandlerTarget" character varying(60) DEFAULT ''::character varying,
    "Registered" bigint NOT NULL,
    "Deleted" bigint,
    "ApiVersionID" uuid NOT NULL
);


ALTER TABLE public."ApiRouteHandlers" OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 17515)
-- Name: ApiRoutes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."ApiRoutes" (
    "ApiRouteID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "ApiID" uuid NOT NULL,
    "ParentID" uuid,
    "Method" character varying(10) DEFAULT 'GET'::character varying,
    "Path" character varying(255) DEFAULT 'v/1/0/0/A/status.json'::character varying,
    "Created" bigint NOT NULL
);


ALTER TABLE public."ApiRoutes" OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 17507)
-- Name: ApiVersions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."ApiVersions" (
    "ApiVersionID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "ApiID" uuid NOT NULL,
    "ParentID" uuid,
    "Identifier" character varying(50) DEFAULT '0.0.1-ALPHA'::character varying,
    "Description" character varying(150) DEFAULT NULL::character varying,
    "Created" bigint NOT NULL
);


ALTER TABLE public."ApiVersions" OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 17500)
-- Name: Apis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Apis" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "Description" character varying(150) DEFAULT NULL::character varying,
    "Created" bigint NOT NULL
);


ALTER TABLE public."Apis" OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 17444)
-- Name: Balances; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Balances" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "Amount" bigint NOT NULL,
    "CurrencyID" uuid NOT NULL
);


ALTER TABLE public."Balances" OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 17292)
-- Name: Categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Categories" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "Path" character varying(255) NOT NULL,
    "Name" character varying(255) NOT NULL,
    "ParentID" uuid
);


ALTER TABLE public."Categories" OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 17298)
-- Name: ContactMethods; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."ContactMethods" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "Medium" character varying(255) NOT NULL,
    "Identifier" character varying(255) NOT NULL,
    "Added" bigint NOT NULL,
    "Modified" bigint
);


ALTER TABLE public."ContactMethods" OWNER TO postgres;

--
-- TOC entry 3861 (class 0 OID 0)
-- Dependencies: 215
-- Name: COLUMN "ContactMethods"."Medium"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."ContactMethods"."Medium" IS 'E.g. Phone, Email, Facebook';


--
-- TOC entry 3862 (class 0 OID 0)
-- Dependencies: 215
-- Name: COLUMN "ContactMethods"."Identifier"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."ContactMethods"."Identifier" IS 'Unique Identifier on Medium (e.g. phone number or twitter handle)';


--
-- TOC entry 232 (class 1259 OID 17449)
-- Name: Currencies; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Currencies" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "Label" character varying(100) NOT NULL,
    "Code" character varying(5) NOT NULL,
    "Symbol" character varying(5) DEFAULT '$'::character varying NOT NULL,
    "SymbolPosition" character varying(6) DEFAULT 'PREFIX'::character varying NOT NULL,
    "ThousandsSeparator" character varying(1) DEFAULT ','::character varying NOT NULL,
    "DecimalSeparator" character varying(1) DEFAULT '.'::character varying NOT NULL,
    "DecimalPlaces" bigint DEFAULT 2 NOT NULL
);


ALTER TABLE public."Currencies" OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 17463)
-- Name: CustomerAccounts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."CustomerAccounts" (
    "CustomerAccountID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "CustomerID" uuid NOT NULL,
    "AccountID" uuid NOT NULL
);


ALTER TABLE public."CustomerAccounts" OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 17304)
-- Name: CustomerContactMethods; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."CustomerContactMethods" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "ContactMethodID" uuid NOT NULL,
    "CustomerID" uuid NOT NULL,
    "Added" bigint NOT NULL
);


ALTER TABLE public."CustomerContactMethods" OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 17308)
-- Name: CustomerInteractions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."CustomerInteractions" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "NoteID" uuid NOT NULL,
    "CustomerID" uuid NOT NULL,
    "StartTime" bigint NOT NULL,
    "EndTime" bigint,
    "MediumID" uuid NOT NULL
);


ALTER TABLE public."CustomerInteractions" OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 17312)
-- Name: CustomerNotes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."CustomerNotes" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "NoteID" uuid NOT NULL,
    "CustomerID" uuid NOT NULL,
    "Recorded" bigint NOT NULL
);


ALTER TABLE public."CustomerNotes" OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 17316)
-- Name: CustomerPayments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."CustomerPayments" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "PaymentID" uuid NOT NULL,
    "CustomerID" uuid NOT NULL,
    "Recorded" bigint NOT NULL,
    "Description" character varying(150) DEFAULT NULL::character varying
);


ALTER TABLE public."CustomerPayments" OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 17321)
-- Name: CustomerSocialProfiles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."CustomerSocialProfiles" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "SocialProfileID" uuid NOT NULL,
    "CustomerID" uuid NOT NULL
);


ALTER TABLE public."CustomerSocialProfiles" OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 17325)
-- Name: Customers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Customers" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "Name" character varying(255) NOT NULL
);


ALTER TABLE public."Customers" OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 17329)
-- Name: Hashes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Hashes" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "HashValue" character varying(255) NOT NULL
);


ALTER TABLE public."Hashes" OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 17333)
-- Name: Notes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Notes" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "Author" uuid NOT NULL,
    "ContentBody" text NOT NULL,
    "Created" bigint NOT NULL
);


ALTER TABLE public."Notes" OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 17536)
-- Name: OrganisationAccounts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."OrganisationAccounts" (
    "OrganisationAccountID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "OrganisationID" uuid NOT NULL,
    "AccountID" uuid NOT NULL
);


ALTER TABLE public."OrganisationAccounts" OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 17561)
-- Name: OrganisationInteractions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."OrganisationInteractions" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "NoteID" uuid NOT NULL,
    "OrganisationID" uuid NOT NULL,
    "StartTime" bigint NOT NULL,
    "EndTime" bigint,
    "MediumID" uuid NOT NULL
);


ALTER TABLE public."OrganisationInteractions" OWNER TO postgres;

--
-- TOC entry 241 (class 1259 OID 17544)
-- Name: OrganisationNotes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."OrganisationNotes" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "NoteID" uuid NOT NULL,
    "OrganisationID" uuid NOT NULL,
    "Recorded" bigint NOT NULL
);


ALTER TABLE public."OrganisationNotes" OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 17532)
-- Name: Organisations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Organisations" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "ParentID" uuid,
    "Name" character varying(200) NOT NULL,
    "Added" bigint
);


ALTER TABLE public."Organisations" OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 17339)
-- Name: Payments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Payments" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "Amount" bigint NOT NULL,
    "CurrencyID" uuid NOT NULL,
    "FeeAmount" bigint DEFAULT 0 NOT NULL,
    "FeeCurrencyID" uuid NOT NULL,
    "PaymentProcessorID" uuid NOT NULL,
    "Received" bigint NOT NULL
);


ALTER TABLE public."Payments" OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 17344)
-- Name: Sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Sessions" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "UserID" uuid,
    "SecretKey" character varying(255) NOT NULL,
    "Started" bigint NOT NULL,
    "Expiry" bigint
);


ALTER TABLE public."Sessions" OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 17348)
-- Name: SocialProfiles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."SocialProfiles" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "URL" character varying(255) NOT NULL,
    "Created" bigint NOT NULL
);


ALTER TABLE public."SocialProfiles" OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 17352)
-- Name: UserHashes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."UserHashes" (
    "UserHashID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "UserID" uuid NOT NULL,
    "HashID" uuid NOT NULL,
    "Type" character varying(100) DEFAULT 'PASSWORD'::character varying NOT NULL,
    "Created" bigint NOT NULL,
    "LastModified" bigint NOT NULL
);


ALTER TABLE public."UserHashes" OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 17357)
-- Name: Users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Users" (
    "ID" uuid DEFAULT gen_random_uuid() NOT NULL,
    "Username" character varying(255) NOT NULL,
    "Name" character varying(255) NOT NULL,
    "IsSuperAdmin" boolean DEFAULT false
);


ALTER TABLE public."Users" OWNER TO postgres;

--
-- TOC entry 3669 (class 2606 OID 17443)
-- Name: AccountBalances AccountBalance_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."AccountBalances"
    ADD CONSTRAINT "AccountBalance_pkey" PRIMARY KEY ("ID");


--
-- TOC entry 3677 (class 2606 OID 17475)
-- Name: AccountPayments AccountPaymentID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."AccountPayments"
    ADD CONSTRAINT "AccountPaymentID" PRIMARY KEY ("ID");


--
-- TOC entry 3667 (class 2606 OID 17438)
-- Name: Accounts Accounts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Accounts"
    ADD CONSTRAINT "Accounts_pkey" PRIMARY KEY ("ID");


--
-- TOC entry 3681 (class 2606 OID 17506)
-- Name: Apis ApiID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Apis"
    ADD CONSTRAINT "ApiID" PRIMARY KEY ("ID");


--
-- TOC entry 3687 (class 2606 OID 17530)
-- Name: ApiRouteHandlers ApiRouteHandlerID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."ApiRouteHandlers"
    ADD CONSTRAINT "ApiRouteHandlerID" PRIMARY KEY ("ApiRouteHandlerID");


--
-- TOC entry 3685 (class 2606 OID 17522)
-- Name: ApiRoutes ApiRouteID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."ApiRoutes"
    ADD CONSTRAINT "ApiRouteID" PRIMARY KEY ("ApiRouteID");


--
-- TOC entry 3683 (class 2606 OID 17514)
-- Name: ApiVersions ApiVersionID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."ApiVersions"
    ADD CONSTRAINT "ApiVersionID" PRIMARY KEY ("ApiVersionID");


--
-- TOC entry 3671 (class 2606 OID 17448)
-- Name: Balances Balances_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Balances"
    ADD CONSTRAINT "Balances_pkey" PRIMARY KEY ("ID");


--
-- TOC entry 3619 (class 2606 OID 17365)
-- Name: Categories CategoryID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Categories"
    ADD CONSTRAINT "CategoryID" PRIMARY KEY ("ID");


--
-- TOC entry 3621 (class 2606 OID 17367)
-- Name: Categories CategoryPath; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Categories"
    ADD CONSTRAINT "CategoryPath" UNIQUE ("Path");


--
-- TOC entry 3627 (class 2606 OID 17369)
-- Name: CustomerContactMethods ContactMethodCustomerID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."CustomerContactMethods"
    ADD CONSTRAINT "ContactMethodCustomerID" UNIQUE ("ContactMethodID", "CustomerID");


--
-- TOC entry 3623 (class 2606 OID 17371)
-- Name: ContactMethods ContactMethodID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."ContactMethods"
    ADD CONSTRAINT "ContactMethodID" PRIMARY KEY ("ID");


--
-- TOC entry 3673 (class 2606 OID 17458)
-- Name: Currencies Currencies_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Currencies"
    ADD CONSTRAINT "Currencies_pkey" PRIMARY KEY ("ID");


--
-- TOC entry 3675 (class 2606 OID 17468)
-- Name: CustomerAccounts CustomerAccounts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."CustomerAccounts"
    ADD CONSTRAINT "CustomerAccounts_pkey" PRIMARY KEY ("CustomerAccountID");


--
-- TOC entry 3629 (class 2606 OID 17373)
-- Name: CustomerContactMethods CustomerContactMethodID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."CustomerContactMethods"
    ADD CONSTRAINT "CustomerContactMethodID" PRIMARY KEY ("ID");


--
-- TOC entry 3647 (class 2606 OID 17375)
-- Name: Customers CustomerID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Customers"
    ADD CONSTRAINT "CustomerID" PRIMARY KEY ("ID");


--
-- TOC entry 3643 (class 2606 OID 17377)
-- Name: CustomerSocialProfiles CustomerIDSocialProfileID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."CustomerSocialProfiles"
    ADD CONSTRAINT "CustomerIDSocialProfileID" UNIQUE ("SocialProfileID", "CustomerID");


--
-- TOC entry 3631 (class 2606 OID 17379)
-- Name: CustomerInteractions CustomerInteractionID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."CustomerInteractions"
    ADD CONSTRAINT "CustomerInteractionID" PRIMARY KEY ("ID");


--
-- TOC entry 3635 (class 2606 OID 17381)
-- Name: CustomerNotes CustomerNoteID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."CustomerNotes"
    ADD CONSTRAINT "CustomerNoteID" PRIMARY KEY ("ID");


--
-- TOC entry 3639 (class 2606 OID 17383)
-- Name: CustomerPayments CustomerPaymentID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."CustomerPayments"
    ADD CONSTRAINT "CustomerPaymentID" PRIMARY KEY ("ID");


--
-- TOC entry 3645 (class 2606 OID 17385)
-- Name: CustomerSocialProfiles CustomerSocialProfileID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."CustomerSocialProfiles"
    ADD CONSTRAINT "CustomerSocialProfileID" PRIMARY KEY ("ID");


--
-- TOC entry 3649 (class 2606 OID 17387)
-- Name: Hashes HashID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Hashes"
    ADD CONSTRAINT "HashID" PRIMARY KEY ("ID");


--
-- TOC entry 3661 (class 2606 OID 17389)
-- Name: UserHashes ID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."UserHashes"
    ADD CONSTRAINT "ID" PRIMARY KEY ("UserHashID");


--
-- TOC entry 3633 (class 2606 OID 17391)
-- Name: CustomerInteractions InteractionNoteCustomerID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."CustomerInteractions"
    ADD CONSTRAINT "InteractionNoteCustomerID" UNIQUE ("NoteID", "CustomerID");


--
-- TOC entry 3697 (class 2606 OID 17568)
-- Name: OrganisationInteractions InteractionNoteOrganisationID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."OrganisationInteractions"
    ADD CONSTRAINT "InteractionNoteOrganisationID" UNIQUE ("NoteID", "OrganisationID");


--
-- TOC entry 3625 (class 2606 OID 17393)
-- Name: ContactMethods MediumID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."ContactMethods"
    ADD CONSTRAINT "MediumID" UNIQUE ("Medium", "Identifier");


--
-- TOC entry 3637 (class 2606 OID 17395)
-- Name: CustomerNotes NoteCustomerID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."CustomerNotes"
    ADD CONSTRAINT "NoteCustomerID" UNIQUE ("NoteID", "CustomerID");


--
-- TOC entry 3651 (class 2606 OID 17397)
-- Name: Notes NoteID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Notes"
    ADD CONSTRAINT "NoteID" PRIMARY KEY ("ID");


--
-- TOC entry 3693 (class 2606 OID 17551)
-- Name: OrganisationNotes NoteOrganisationID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."OrganisationNotes"
    ADD CONSTRAINT "NoteOrganisationID" UNIQUE ("NoteID", "OrganisationID");


--
-- TOC entry 3691 (class 2606 OID 17541)
-- Name: OrganisationAccounts OrganisationAccountID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."OrganisationAccounts"
    ADD CONSTRAINT "OrganisationAccountID" PRIMARY KEY ("OrganisationAccountID");


--
-- TOC entry 3699 (class 2606 OID 17566)
-- Name: OrganisationInteractions OrganisationInteractionID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."OrganisationInteractions"
    ADD CONSTRAINT "OrganisationInteractionID" PRIMARY KEY ("ID");


--
-- TOC entry 3695 (class 2606 OID 17549)
-- Name: OrganisationNotes OrganisationNoteID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."OrganisationNotes"
    ADD CONSTRAINT "OrganisationNoteID" PRIMARY KEY ("ID");


--
-- TOC entry 3689 (class 2606 OID 17543)
-- Name: Organisations Organisations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Organisations"
    ADD CONSTRAINT "Organisations_pkey" PRIMARY KEY ("ID");


--
-- TOC entry 3679 (class 2606 OID 17477)
-- Name: AccountPayments PaymentAccountID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."AccountPayments"
    ADD CONSTRAINT "PaymentAccountID" UNIQUE ("PaymentID", "AccountID");


--
-- TOC entry 3641 (class 2606 OID 17399)
-- Name: CustomerPayments PaymentCustomerID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."CustomerPayments"
    ADD CONSTRAINT "PaymentCustomerID" UNIQUE ("PaymentID", "CustomerID");


--
-- TOC entry 3653 (class 2606 OID 17401)
-- Name: Payments PaymentID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Payments"
    ADD CONSTRAINT "PaymentID" PRIMARY KEY ("ID");


--
-- TOC entry 3655 (class 2606 OID 17403)
-- Name: Sessions SessionID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Sessions"
    ADD CONSTRAINT "SessionID" PRIMARY KEY ("ID");


--
-- TOC entry 3657 (class 2606 OID 17405)
-- Name: Sessions SessionUserSecretKey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Sessions"
    ADD CONSTRAINT "SessionUserSecretKey" UNIQUE ("UserID", "SecretKey");


--
-- TOC entry 3659 (class 2606 OID 17407)
-- Name: SocialProfiles SocialProfileID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SocialProfiles"
    ADD CONSTRAINT "SocialProfileID" PRIMARY KEY ("ID");


--
-- TOC entry 3663 (class 2606 OID 17409)
-- Name: Users UserID; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Users"
    ADD CONSTRAINT "UserID" PRIMARY KEY ("ID");


--
-- TOC entry 3665 (class 2606 OID 17411)
-- Name: Users UserUsername; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Users"
    ADD CONSTRAINT "UserUsername" UNIQUE ("Username");


--
-- TOC entry 3700 (class 2606 OID 17412)
-- Name: UserHashes HashID; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."UserHashes"
    ADD CONSTRAINT "HashID" FOREIGN KEY ("HashID") REFERENCES public."Hashes"("ID");


--
-- TOC entry 3701 (class 2606 OID 17417)
-- Name: UserHashes UserID; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."UserHashes"
    ADD CONSTRAINT "UserID" FOREIGN KEY ("UserID") REFERENCES public."Users"("ID");


--
-- TOC entry 3851 (class 0 OID 0)
-- Dependencies: 230
-- Name: TABLE "AccountBalances"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."AccountBalances" TO lexar;


--
-- TOC entry 3852 (class 0 OID 0)
-- Dependencies: 234
-- Name: TABLE "AccountPayments"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."AccountPayments" TO lexar;


--
-- TOC entry 3854 (class 0 OID 0)
-- Dependencies: 229
-- Name: TABLE "Accounts"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."Accounts" TO lexar;


--
-- TOC entry 3855 (class 0 OID 0)
-- Dependencies: 238
-- Name: TABLE "ApiRouteHandlers"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."ApiRouteHandlers" TO lexar;


--
-- TOC entry 3856 (class 0 OID 0)
-- Dependencies: 237
-- Name: TABLE "ApiRoutes"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."ApiRoutes" TO lexar;


--
-- TOC entry 3857 (class 0 OID 0)
-- Dependencies: 236
-- Name: TABLE "ApiVersions"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."ApiVersions" TO lexar;


--
-- TOC entry 3858 (class 0 OID 0)
-- Dependencies: 235
-- Name: TABLE "Apis"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."Apis" TO lexar;


--
-- TOC entry 3859 (class 0 OID 0)
-- Dependencies: 231
-- Name: TABLE "Balances"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."Balances" TO lexar;


--
-- TOC entry 3860 (class 0 OID 0)
-- Dependencies: 214
-- Name: TABLE "Categories"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."Categories" TO lexar;


--
-- TOC entry 3863 (class 0 OID 0)
-- Dependencies: 215
-- Name: TABLE "ContactMethods"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."ContactMethods" TO lexar;


--
-- TOC entry 3864 (class 0 OID 0)
-- Dependencies: 232
-- Name: TABLE "Currencies"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."Currencies" TO lexar;


--
-- TOC entry 3865 (class 0 OID 0)
-- Dependencies: 233
-- Name: TABLE "CustomerAccounts"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."CustomerAccounts" TO lexar;


--
-- TOC entry 3866 (class 0 OID 0)
-- Dependencies: 216
-- Name: TABLE "CustomerContactMethods"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."CustomerContactMethods" TO lexar;


--
-- TOC entry 3867 (class 0 OID 0)
-- Dependencies: 217
-- Name: TABLE "CustomerInteractions"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."CustomerInteractions" TO lexar;


--
-- TOC entry 3868 (class 0 OID 0)
-- Dependencies: 218
-- Name: TABLE "CustomerNotes"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."CustomerNotes" TO lexar;


--
-- TOC entry 3869 (class 0 OID 0)
-- Dependencies: 219
-- Name: TABLE "CustomerPayments"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."CustomerPayments" TO lexar;


--
-- TOC entry 3870 (class 0 OID 0)
-- Dependencies: 220
-- Name: TABLE "CustomerSocialProfiles"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."CustomerSocialProfiles" TO lexar;


--
-- TOC entry 3871 (class 0 OID 0)
-- Dependencies: 221
-- Name: TABLE "Customers"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."Customers" TO lexar;


--
-- TOC entry 3872 (class 0 OID 0)
-- Dependencies: 222
-- Name: TABLE "Hashes"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."Hashes" TO lexar;


--
-- TOC entry 3873 (class 0 OID 0)
-- Dependencies: 223
-- Name: TABLE "Notes"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."Notes" TO lexar;


--
-- TOC entry 3874 (class 0 OID 0)
-- Dependencies: 240
-- Name: TABLE "OrganisationAccounts"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."OrganisationAccounts" TO lexar;


--
-- TOC entry 3875 (class 0 OID 0)
-- Dependencies: 242
-- Name: TABLE "OrganisationInteractions"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."OrganisationInteractions" TO lexar;


--
-- TOC entry 3876 (class 0 OID 0)
-- Dependencies: 241
-- Name: TABLE "OrganisationNotes"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."OrganisationNotes" TO lexar;


--
-- TOC entry 3877 (class 0 OID 0)
-- Dependencies: 239
-- Name: TABLE "Organisations"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."Organisations" TO lexar;


--
-- TOC entry 3878 (class 0 OID 0)
-- Dependencies: 224
-- Name: TABLE "Payments"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."Payments" TO lexar;


--
-- TOC entry 3879 (class 0 OID 0)
-- Dependencies: 225
-- Name: TABLE "Sessions"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT,UPDATE ON TABLE public."Sessions" TO lexar;


--
-- TOC entry 3880 (class 0 OID 0)
-- Dependencies: 226
-- Name: TABLE "SocialProfiles"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."SocialProfiles" TO lexar;


--
-- TOC entry 3881 (class 0 OID 0)
-- Dependencies: 227
-- Name: TABLE "UserHashes"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."UserHashes" TO lexar;


--
-- TOC entry 3882 (class 0 OID 0)
-- Dependencies: 228
-- Name: TABLE "Users"; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT ON TABLE public."Users" TO lexar;


-- Completed on 2024-10-06 17:37:14 AEDT

--
-- PostgreSQL database dump complete
--

