
/* Main issuers */
DROP TABLE IF EXISTS bono_module_insurance_issuer;
CREATE TABLE bono_module_insurance_issuer (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `phone` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `created_at` DATETIME NOT NULL
);

/* Clients of issuers */
DROP TABLE IF EXISTS bono_module_insurance_issuer_clients;
CREATE TABLE bono_module_insurance_issuer_clients (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `issuer_id` INT NOT NULL,
    `name` varchar(255) NOT NULL,
    `passport` varchar(255) NOT NULL,
    `birthday` DATE NOT NULL,

    FOREIGN KEY (issuer_id) REFERENCES bono_module_insurance_issuer(id) ON DELETE CASCADE

) ENGINE = InnoDB DEFAULT CHARSET = UTF8;
