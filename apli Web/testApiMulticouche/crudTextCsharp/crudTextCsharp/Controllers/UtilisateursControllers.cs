using AutoMapper;
using crudTextCsharp.Data.Models;
using crudTextCsharp.Data.Services;
using crudTextCsharp.Dtos.Models;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace crudTextCsharp.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class UtilisateursControllers:Controller
    {

        private readonly UtilisateursService _service;
        private readonly IMapper _mapper;

        public UtilisateursControllers(UtilisateursService service, IMapper mapper)
        {
            _service = service;
            _mapper = mapper;
        }

        //GET api/Utilisateurs
        [HttpGet]
        public ActionResult<IEnumerable<UtilisateurDTOout>> GetAllUtilisateurs()
        {
            IEnumerable<Utilisateur> listeUtilisateurs = _service.GetAllUtilisateurs();
            return Ok(_mapper.Map<IEnumerable<UtilisateurDTOout>>(listeUtilisateurs));
        }

        //GET api/Utilisateurs/{i}
        [HttpGet("{id}", Name = "GetUtilisateurById")]
        public ActionResult<UtilisateurDTOout> GetUtilisateurById(int id)
        {
            Utilisateur commandItem = _service.GetUtilisateurById(id);
            if (commandItem != null)
            {
                return Ok(_mapper.Map<UtilisateurDTOout>(commandItem));
            }
            return NotFound();
        }

        //POST api/Utilisateurs
        [HttpPost]
        public ActionResult<UtilisateurDTOout> CreateUtilisateur(UtilisateurDTOin obj)
        {
            Utilisateur user = _mapper.Map<Utilisateur>(obj);
            _service.AddUtilisateur(user);
            return CreatedAtRoute(nameof(GetUtilisateurById), new { Id = user.IdUtilisateur }, user);
        }

        //POST api/Utilisateurs/{id}
        [HttpPut("{id}")]
        public ActionResult UpdateUtilisateur(int id, UtilisateurDTOin obj)
        {
            Utilisateur objFromRepo = _service.GetUtilisateurById(id);
            if (objFromRepo == null)
            {
                return NotFound();
            }
            _mapper.Map(obj, objFromRepo);
            _service.UpdateUtilisateur(objFromRepo);
            return NoContent();
        }

        //DELETE api/Utilisateurs/{id}
        [HttpDelete("{id}")]
        public ActionResult DeleteUtilisateur(int id)
        {
            Utilisateur obj = _service.GetUtilisateurById(id);
            if (obj == null)
            {
                return NotFound();
            }
            _service.DeleteUtilisateur(obj);
            return NoContent();
        }


    }
}
