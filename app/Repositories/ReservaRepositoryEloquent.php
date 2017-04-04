<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\reservaRepository;
use SA\Models\Reserva;
use SA\Presenters\ReservaPresenter;

/**
 * Class ReservaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class ReservaRepositoryEloquent extends BaseRepository implements ReservaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Reserva::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return ReservaPresenter::class;
    }

    public function applyMultitenancy()
    {
        Reserva::clearBootedModels();
    }

    /**
     * AQUI EU FARIA A LOGICA, PEGARIA O USUARIO LOGADO, NA VERDADE SERIA O LOGIN DO USUARIO QUE É MINHA CHAVE
     * E VERIFICARIA NA TABELA DE inadimplentes SE O MESMO ESTÁ COM STATUS = 'S'(O USUARIO ESTA INADIMPLENTES),
     * E RETORNARIA TRUE (ELE ESTA INADIMPLENTE) E LÁ NO CONTROLE FARIA A CHAMADA PARA TESTAR ESSE METODO
     * Seria isso mesmo?
     */
    //VERIFICANDO SE O USUARIO ESTA INADIMPLENTE
    public function getInadimplencia($usuario)
    {

    }


}
