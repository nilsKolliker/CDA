using System;
using System.Collections.Generic;

#nullable disable

namespace Gestion_de_Produits.Data.Dtos
{
    public partial class CategorieDTOin
    {
        public int IdCategorie { get; set; }
        public string LibelleCategorie { get; set; }
    }
    public partial class CategorieDTOout
    {
        public string LibelleCategorie { get; set; }
    }

    //public partial class CategorieDTO
    //{
    //    public CategorieDTO()
    //    {
    //        Produits = new HashSet<ProduitDTO>();
    //    }

    //    public int IdCategorie { get; set; }
    //    public string LibelleCategorie { get; set; }

    //    public virtual ICollection<ProduitDTO> Produits { get; set; }
    //}
}
