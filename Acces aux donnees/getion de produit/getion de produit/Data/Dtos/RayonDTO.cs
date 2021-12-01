using System;
using System.Collections.Generic;

#nullable disable

namespace Gestion_de_Produits.Data.Dtos
{
    public partial class RayonDTOin
    {
        public int IdRayon { get; set; }
        public string LibelleRayon { get; set; }
    }

    public partial class RayonDTOout
    {
        public string LibelleRayon { get; set; }
    }
    //public partial class RayonDTO
    //{
    //    public RayonDTO()
    //    {
    //        Produits = new HashSet<Produit>();
    //    }

    //    public int IdRayon { get; set; }
    //    public string LibelleRayon { get; set; }

    //    public virtual ICollection<Produit> Produits { get; set; }
    //}
}
