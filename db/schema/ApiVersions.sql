
CREATE TABLE IF NOT EXISTS public."ApiVersions"
(
    "ApiVersionID" uuid NOT NULL DEFAULT gen_random_uuid(),
    "ApiID" uuid NOT NULL,
    "Identifier" character varying(50) DEFAULT '0.0.1-ALPHA',
    "Description" character varying(150) COLLATE pg_catalog."default" DEFAULT NULL::character varying,
    "Created" bigint NOT NULL,
    CONSTRAINT "ApiID" PRIMARY KEY ("ID")
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public."ApiVersions"
    OWNER to postgres;

GRANT INSERT, SELECT ON TABLE public."ApiVersions" TO lexar;

GRANT ALL ON TABLE public."ApiVersions" TO postgres;


