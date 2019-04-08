DROP TABLE IF EXISTS client CASCADE;
CREATE TABLE client (
    client_id uuid PRIMARY KEY,
    name VARCHAR(255)
);

DROP TABLE IF EXISTS invoice CASCADE;
CREATE TABLE invoice(
    invoice_id uuid PRIMARY KEY,
    client_id uuid references client(client_id),
    number VARCHAR(32) NOT NULL,
    sent_at DATE NULL,
    paid_at DATE NULL,
    amount_ht NUMERIC(10,2) NOT NULL,
    amount_ttc NUMERIC(10,2) NOT NULL,
    UNIQUE(number)
);

DROP INDEX IF EXISTS fk_invoice_client_id;
CREATE INDEX fk_invoice_client_id ON invoice(client_id);