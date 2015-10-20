<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Disposition Entity.
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property bool $active
 * @property int $letter_id
 * @property \App\Model\Entity\Letter $letter
 * @property int $fromhierarchy
 * @property int $tohierarchy
 * @property string $content
 */
class Disposition extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
