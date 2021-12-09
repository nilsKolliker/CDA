using AutoMapper;
using Gestion_de_Produits.Data.Dtos;
using Gestion_de_Produits.Data.Profiles;
using Gestion_de_Produits.Data.Services;
using getion_de_produit.Data.Models;
using System.Collections.Generic;

namespace Gestion_de_Produits.Controllers
{
    public class ProduitsController
    {

        private readonly ProduitsServices _service;
        private readonly IMapper _mapper;

        public ProduitsController()
        {
            _service = new ProduitsServices();
            _mapper = new MaMap();
        }

        public IEnumerable<ProduitDTOout> GetAllProduits()
        {
            IEnumerable<Produit> listeProduits = (IEnumerable<Produit>)_service.GetAllProduits();
            return _mapper.Map<IEnumerable<ProduitDTOout>>(listeProduits);
        }

        public ProduitDTOout GetProduitById(int id)
        {
            Produit commandItem = _service.GetProduitById(id);
            if (commandItem != null)
            {
                return _mapper.Map<ProduitDTOout>(commandItem);
            }
            return new ProduitDTOout();
        }

        public void CreateProduit(ProduitDTOin obj)
        {
            Produit produit = _mapper.Map<Produit>(obj);
            _service.AddProduit(produit);
        }

        public void UpdateProduit(int id, ProduitDTOin obj)
        {
            Produit objFromRepo = _service.GetProduitById(id);
            if (objFromRepo == null)
            {
                return;
            }
            _mapper.Map(obj, objFromRepo);
            _service.UpdateProduit(objFromRepo);
        }

        public void DeleteProduit(int id)
        {
            Produit obj = _service.GetProduitById(id);
            if (obj == null)
            {
                return;
            }
            _service.DeleteProduit(obj);
        }


    }
}
