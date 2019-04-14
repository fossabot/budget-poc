DROP TABLE IF EXISTS client CASCADE;
CREATE TABLE client (
    client_id uuid PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL
);

DROP TABLE IF EXISTS invoice CASCADE;
CREATE TABLE invoice(
    invoice_id uuid PRIMARY KEY,
    client_id uuid NOT NULL references client(client_id),
    number VARCHAR(255) NOT NULL,
    sent_at DATE NULL,
    paid_at DATE NULL,
    amount_ht INT NOT NULL,
    amount_ttc INT NOT NULL,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
    UNIQUE(number)
);

DROP INDEX IF EXISTS fk_invoice_client_id;
CREATE INDEX fk_invoice_client_id ON invoice(client_id);

DROP TABLE IF EXISTS app_user CASCADE;
CREATE TABLE app_user(
    app_user_id uuid PRIMARY KEY,
    email VARCHAR(180) NOT NULL,
    roles JSON NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
    UNIQUE(email)
);
