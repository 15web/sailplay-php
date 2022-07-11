<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListValues\Response;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-values-list
 */
final class ListValuesPurchaseAttributesResponse
{
    /**
     * Статус ответа
     *
     * @var string
     */
    private $status;

    /**
     * Кол-во страниц пагинации
     *
     * @var int|null
     */
    private $numPages;

    /**
     * Указатель кол-ва объектов значений на странице
     *
     * @var int|null
     */
    private $itemsPerPage;

    /**
     * @var PurchaseAttributeValue[]|null
     */
    private $values;

    /**
     * @param PurchaseAttributeValue[]|null $values
     */
    public function __construct(
        string $status,
        ?int $numPages,
        ?int $itemsPerPage,
        ?array $values
    ) {
        $this->status = $status;
        $this->numPages = $numPages;
        $this->itemsPerPage = $itemsPerPage;
        $this->values = $values;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getNumPages(): ?int
    {
        return $this->numPages;
    }

    public function getItemsPerPage(): ?int
    {
        return $this->itemsPerPage;
    }

    /**
     * @return PurchaseAttributeValue[]|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }
}
