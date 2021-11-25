using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

#nullable disable

namespace tableLié.Data.Models
{
    public partial class Ville
    {
        [Key]
        public int IdVille { get; set; }
        public string Libelle { get; set; }
        public int IdDepartement { get; set; }
        public Departement Departement { get; set; }
    }
}
