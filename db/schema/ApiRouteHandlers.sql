CREATE TABLE IF NOT EXISTS public."ApiRouteHandlers"
(
    "ApiRouteHandlerID" uuid NOT NULL DEFAULT gen_random_uuid(),
    "ApiRouteID" uuid NOT NULL,
    "HandlerType" character varying(60) DEFAULT 'URL_CALLBACK', /* or SMS_MESSAGE, EMAIL, or PHONE CALL */
    "HandlerTarget" character varying(60) DEFAULT ''
    "Registered" bigint NOT NULL,
    "Deleted" bigint DEFAULT NULL,
    CONSTRAINT "ApiRouteHandlerID" PRIMARY KEY ("ID")
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public."ApiRoutes"
    OWNER to postgres;

GRANT INSERT, SELECT ON TABLE public."ApiRoutes" TO lexar;

GRANT ALL ON TABLE public."ApiRoutes" TO postgres;


