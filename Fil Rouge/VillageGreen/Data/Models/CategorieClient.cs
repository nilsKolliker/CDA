using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class CategorieClient
    {
        public CategorieClient()
        {
            Clients = new HashSet<Client>();
        }

        public int IdCategorieClient { get; set; }
        public string LibelleCategClient { get; set; }
        public string InfoReglement { get; set; }
        public int CoefCategClient { get; set; }

        public virtual ICollection<Client> Clients { get; set; }
    }
}
