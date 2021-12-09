using System;
using System.Collections.Generic;

#nullable disable

namespace Gestion_de_Produits.Data.Dtos
{
    public partial class ProduitDTOin
    {
        public int IdProduit { get; set; }
        public string LibelleProduit { get; set; }
        public int IdCategorie { get; set; }
        public int IdRayon { get; set; }
    }
    public partial class ProduitDTOout
    {
        public int IdProduit { get; set; }
        public string LibelleProduit { get; set; }
        public virtual CategorieDTOout Categorie { get; set; }
        public virtual RayonDTOout Rayon { get; set; }
    }

    //public partial class ProduitDTO
    //{
    //    public int IdProduit { get; set; }
    //    public string LibelleProduit { get; set; }
    //    public int IdCategorie { get; set; }
    //    public int IdRayon { get; set; }

    //    public virtual Categorie Categorie { get; set; }
    //    public virtual RayonDTO Rayon { get; set; }
    //}
}
