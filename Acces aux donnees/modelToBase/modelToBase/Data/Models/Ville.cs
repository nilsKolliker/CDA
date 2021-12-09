using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace modelToBase.Data.Models
{
    public class Ville
    {
        [Key]
        public int IdVille{ get; set; }

        [Required]
        [MaxLength(50)]
        public string Libelle { get; set; }
    }
}
