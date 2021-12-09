using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class ProgressionCommande
    {
        public int IdProgressionsCommande { get; set; }
        public int? IdCommande { get; set; }
        public int? IdEtatCommande { get; set; }
        public DateTime DateEtatCommande { get; set; }

        public virtual Commande Commande { get; set; }
        public virtual EtatCommande EtatCommande { get; set; }
    }
}
