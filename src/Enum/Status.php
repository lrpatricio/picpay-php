<?php


namespace PicPay\Enum;


class Status
{
    /**
     * Registro criado
     */
    const CREATED = "created";

    /**
     * Prazo para pagamento expirado
     */
    const EXPIRED = "expired";

    /**
     * Pago e em processo de análise anti-fraude
     */
    const ANALYSIS = "analysis";

    /**
     * Pago
     */
    const PAID = "paid";

    /**
     * Pago e saldo disponível
     */
    const COMPLETED = "completed";

    /**
     * Pago e devolvido
     */
    const REFUNDED = "refunded";

    /**
     * Pago e com chargeback
     */
    const CHARGEBACK = "chargeback";
}