<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hierarchy Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\Hierarchy $parent_hierarchy
 * @property string $name
 * @property bool $active
 * @property \App\Model\Entity\Hierarchy[] $child_hierarchies
 */
class Hierarchy extends Entity
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
