<?php
namespace dlaser\HcBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class HcRepository extends EntityRepository{
	
	public function findLastHc($pacienteId){
		
		$em = $this->getEntityManager();		
		$dql = $em->createQuery("SELECT 
									hc 
								FROM 
									HcBundle:Hc hc 
								JOIN 
									hc.factura f 
								JOIN 
									f.paciente p
								WHERE 
									p.identificacion = :id 
								ORDER BY 
									hc.fecha DESC");
			
		$dql->setParameter('id', $pacienteId);
		$dql->setMaxResults(1);
		$HC = $dql->getResult();
		
		if($HC){
			return $HC = $dql->getSingleResult();			
		}else{
			return $HC = null;
		}
	}
	
	public function findSignos($pacienteId){
		
		$em = $this->getEntityManager();		
		$dql = $em->createQuery("SELECT
									hc
								FROM
									HcBundle:Hc hc
								JOIN
									hc.factura f
								JOIN
									f.paciente p
								WHERE
									p.id = :id
								ORDER BY
									hc.fecha DESC");
		
		$dql->setParameter('id', $pacienteId);		
		return $dql->getResult();
	}
        
        public function findMediciones($pacienteId){
		
		$em = $this->getEntityManager();		
		$dql = $em->createQuery("SELECT
									he
								FROM
									HcBundle:HcEstetica he
                                                                JOIN
                                                                        he.hc h
								JOIN
									h.factura f
								JOIN
									f.paciente p
								WHERE
									p.id = :id
								ORDER BY
									he.fecha DESC");
		
		$dql->setParameter('id', $pacienteId);		
		return $dql->getResult();
	}
	
	public function findListHc($identificacion){
		
		$em = $this->getEntityManager();
		$dql = $em->createQuery("SELECT
										hc
									 FROM
										HcBundle:Hc hc
									 JOIN
										hc.factura f
									 JOIN
										f.paciente p
									 WHERE
										f.estado = 'I' AND
										p.identificacion = :id
										
									 ORDER BY
										hc.fecha DESC");
		
		$dql->setParameter('id', $identificacion);
		//$dql->setParameter('tipo', $tipo);
		return $dql->getResult();
	}
	
	public function findPaginadorHc($pacienteId){
	
		$em = $this->getEntityManager();
		$dql = $em->createQuery("SELECT
										hc
									FROM
										HcBundle:Hc hc
									JOIN
										hc.factura f
									JOIN
										f.paciente p
									WHERE
										f.estado = 'I'
									AND
										p.id = :id
									ORDER BY
										hc.fecha DESC");
		
		$dql->setParameter('id', $pacienteId);		
		return $dql->getResult();
	}
}