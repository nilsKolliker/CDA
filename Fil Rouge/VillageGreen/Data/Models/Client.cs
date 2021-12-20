using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class Client
    {
        public Client()
        {
            Commandes = new HashSet<Commande>();
        }

        public int IdUser { get; set; }
        public string RefClient { get; set; }
        public int CoefClient { get; set; }
        public int IdCategorieClient { get; set; }

        public virtual CategorieClient CategorieClient { get; set; }
        public virtual ICollection<Commande> Commandes { get; set; }
    }
}
