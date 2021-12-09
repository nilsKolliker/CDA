using modelToBase.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace modelToBase.Data.Dtos
{
    public class DepartementsDTO
    {
        public string Libelle { get; set; }
        public List<Ville> ListeVilles { get; set; }
    }
}
