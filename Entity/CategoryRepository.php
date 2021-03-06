<?php

namespace Softlogo\ProductBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
	public function findAll()
	{
		//return $this->findBy(array(), array('parent.itemorder'=>'asc'));  
        $qb = $this->createQueryBuilder('o')->leftJoin('o.parent', 'p')
        ->orderBy('p.itemorder, o.itemorder', 'ASC');   
          
        $query = $qb->getQuery();       
        return $query->getResult();     

	}

}

